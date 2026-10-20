<?php
/**
 * Contact form (kontakt.php).
 *
 * Protection layers:
 *   - CSRF token per session, rotated after every use
 *   - honeypot field that only bots fill in
 *   - rate limit per session (config: contact.rate_limit)
 *   - subject whitelist (contact_subjects())
 *   - line breaks stripped from header-bound input; the visitor's address
 *     only ever goes into Reply-To, never into From/To (no header injection)
 */

declare(strict_types=1);

const CONTACT_HONEYPOT_FIELD = 'website';

/**
 * Subjects the form offers, key => label (config: contact.subjects),
 * plus the upcoming event's subject while there is one.
 *
 * @return array<string, string>
 */
function contact_subjects(): array
{
    $subjects = config('contact.subjects');
    $event = upcoming_event();
    if ($event !== null) {
        $subjects['veranstaltung'] = $event['subject'];
    }

    return $subjects;
}

/**
 * Handles the current request and returns the state the view renders.
 * After a failed submit, 'values' holds the input so nobody has to type it again.
 *
 * @return array{sent: bool, error: string, csrf_token: string, values: array{name: string, email: string, subject: string, message: string}}
 */
function contact_form_handle(): array
{
    session_start_secure();

    // Subject preselected by links like /kontakt.php?betreff=workshop
    $values = ['name' => '', 'email' => '', 'subject' => contact_subject_key($_GET['betreff'] ?? null), 'message' => ''];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = contact_form_submit($_POST);
        if (!$result['sent']) {
            $values = [
                'name'    => contact_field($_POST, 'name'),
                'email'   => contact_field($_POST, 'email'),
                'subject' => contact_subject_key($_POST['subject'] ?? null),
                'message' => contact_field($_POST, 'message'),
            ];
        }
    } else {
        csrf_rotate();
        $result = ['sent' => false, 'error' => ''];
    }

    return $result + ['csrf_token' => csrf_token(), 'values' => $values];
}

/**
 * A valid subject key, falling back to the first subject.
 */
function contact_subject_key(mixed $key): string
{
    $subjects = contact_subjects();

    return is_string($key) && isset($subjects[$key]) ? $key : (string) array_key_first($subjects);
}

/**
 * @param array<string, mixed> $input  The submitted form fields.
 * @return array{sent: bool, error: string}
 */
function contact_form_submit(array $input): array
{
    // Bots fill the hidden field. Pretend success so they learn nothing.
    if (!empty($input[CONTACT_HONEYPOT_FIELD])) {
        return ['sent' => true, 'error' => ''];
    }

    if (!csrf_valid($input['csrf_token'] ?? null)) {
        return ['sent' => false, 'error' => 'Ungültige Anfrage. Bitte laden Sie die Seite neu.'];
    }
    csrf_rotate();

    if (contact_rate_limited()) {
        return ['sent' => false, 'error' => 'Zu viele Anfragen. Bitte warten Sie einige Minuten.'];
    }

    $message = contact_message_from($input);
    if ($message === null) {
        return ['sent' => false, 'error' => 'Bitte füllen Sie alle Felder korrekt aus.'];
    }

    if (!contact_send($message)) {
        return ['sent' => false, 'error' => 'Es gab ein Problem beim Senden. Bitte versuchen Sie es später erneut.'];
    }

    $_SESSION['contact_times'][] = time();

    return ['sent' => true, 'error' => ''];
}

/**
 * Sanitises and validates the input. Returns null if anything is missing or invalid.
 *
 * @return array{name: string, email: string, subject: string, message: string}|null
 */
function contact_message_from(array $input): ?array
{
    $name    = mb_substr((string) preg_replace('/[\r\n\t]/', ' ', strip_tags(contact_field($input, 'name'))), 0, 120);
    $email   = (string) filter_var(contact_field($input, 'email'), FILTER_SANITIZE_EMAIL);
    $message = mb_substr(strip_tags(contact_field($input, 'message')), 0, 5000);

    $subject = contact_subjects()[contact_subject_key($input['subject'] ?? null)];

    if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return null;
    }

    return ['name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message];
}

/**
 * A single trimmed text field; anything that isn't a string (e.g. name[]=…) becomes ''.
 */
function contact_field(array $input, string $key): string
{
    $value = $input[$key] ?? '';

    return is_string($value) ? trim($value) : '';
}

/**
 * Counts this session's recent messages and drops expired timestamps.
 */
function contact_rate_limited(): bool
{
    ['max' => $max, 'window' => $window] = config('contact.rate_limit');

    $since = time() - $window;
    $_SESSION['contact_times'] = array_values(array_filter(
        $_SESSION['contact_times'] ?? [],
        static fn (int $time): bool => $time > $since
    ));

    return count($_SESSION['contact_times']) >= $max;
}

/**
 * @param array{name: string, email: string, subject: string, message: string} $message
 */
function contact_send(array $message): bool
{
    $body = "Name: {$message['name']}\n"
          . "Email: {$message['email']}\n\n"
          . "Nachricht:\n{$message['message']}\n";

    $headers = [
        'From'         => config('site.name') . ' <' . config('contact.sender') . '>',
        'Reply-To'     => $message['email'],
        'Content-Type' => 'text/plain; charset=UTF-8',
        'MIME-Version' => '1.0',
    ];

    return mail(config('contact.recipient'), $message['subject'], $body, $headers);
}
