<?php
/**
 * Page meta and structured data (Schema.org JSON-LD).
 */

declare(strict_types=1);

/**
 * Fills in defaults for a page's meta data.
 *
 * Required keys:
 *   title         <title> text
 *   description   meta description
 *   path          URL path, e.g. '/kontakt.php'
 *
 * Optional keys (default):
 *   og_type       'website'
 *   og_title      title
 *   og_image      config('seo.og_image')
 *   og_image_alt  config('seo.og_image_alt')
 *   twitter_card  'summary_large_image'
 *   robots        'index, follow'
 *   stylesheet    page stylesheet name, null for none
 *   schema        JSON-LD array (default: a WebPage built from the meta)
 */
function page_meta(array $page): array
{
    $page += [
        'og_type'      => 'website',
        'og_title'     => $page['title'],
        'og_image'     => config('seo.og_image'),
        'og_image_alt' => config('seo.og_image_alt'),
        'twitter_card' => 'summary_large_image',
        'robots'       => 'index, follow',
        'stylesheet'   => null,
    ];
    $page['canonical'] = absolute_url($page['path']);
    $page['schema']  ??= schema_web_page($page);

    return $page;
}

/**
 * Schema.org WebPage for a regular content page.
 */
function schema_web_page(array $page): array
{
    return [
        '@context'    => 'https://schema.org',
        '@type'       => 'WebPage',
        'name'        => $page['og_title'],
        'description' => $page['description'],
        'url'         => $page['canonical'],
        'inLanguage'  => config('site.lang'),
        'publisher'   => [
            '@type' => 'Organization',
            'name'  => config('site.name'),
            'url'   => config('site.url'),
        ],
    ];
}

/**
 * Schema.org Organization for the home page.
 */
function schema_organization(): array
{
    return [
        '@context'    => 'https://schema.org',
        '@type'       => 'Organization',
        'name'        => config('site.name'),
        'url'         => config('site.url'),
        'logo'        => config('seo.og_image'),
        'email'       => config('contact.email'),
        'description' => config('site.description'),
    ];
}

/**
 * Encodes data for a <script type="application/ld+json"> block.
 * JSON_HEX_TAG makes it impossible to break out of the script element.
 */
function json_ld(array $data): string
{
    return json_encode(
        $data,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_THROW_ON_ERROR
    );
}
