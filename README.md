# disinfoawareness.eu

Website of **Disinfo Awareness**, a Vienna-based association raising awareness of disinformation and FIMI.
Plain PHP (8.1+), HTML, CSS and vanilla JavaScript. No build step, no dependencies to install.
Everything — fonts, images, scripts — is served from this domain; no requests go to third parties.

Design decisions and the design system (colours, type, components, page structure):
**[`design/Design-Baseline.md`](design/Design-Baseline.md)** (German).

## Structure

```
├── index.php, kontakt.php, …   Public pages. One file per URL: page meta + one render call.
├── sitemap.php                 XML sitemap (also served as /sitemap.xml)
│
├── app/                        Everything behind the pages. Not reachable from the web.
│   ├── bootstrap.php           Loaded first by every page
│   ├── config.php              Site settings: URLs, e-mail addresses, contact subjects, bank details, LinkedIn
│   ├── data/
│   │   ├── projects.php        The 4 project areas: home hero/cards + full project page content
│   │   ├── team.php            Team members
│   │   └── event.php           Upcoming event (hidden automatically after its date)
│   ├── lib/                    PHP helpers (rendering, images, icons, SEO, contact form, CSRF)
│   └── views/
│       ├── layout/             HTML frame: <head>, header + menu, footer
│       ├── partials/           Reusable blocks: page header, CTA, donation teaser, project card, team member
│       └── pages/              Markup of each page (project.php is shared by all 4 project pages)
│
├── assets/
│   ├── css/
│   │   ├── tokens.css          ★ Design tokens — colours, fonts, type scale, spacing. Start here.
│   │   ├── base.css            Fonts, reset, typography, utilities, scroll reveal
│   │   ├── layout.css          Header, navigation, menu dialog, page header, sections, footer
│   │   ├── components.css      Buttons, labels, cards, CTA, donation teaser, form fields, chips
│   │   └── pages/              One stylesheet per page type, loaded only on that page
│   ├── js/main.js              Header, dropdown, menu dialog, reveal, team gallery, copy buttons
│   ├── fonts/                  Anton + Manrope (WOFF2, self-hosted, OFL licences included)
│   ├── img/                    Photos as WebP in several widths (see "Photos" below)
│   └── icons/                  App icons referenced by site.webmanifest
│
├── design/                     Design briefing, reference screenshots, design baseline (not served)
├── docs/                       Project notes (not served)
├── .htaccess                   HTTPS, redirects, security headers, caching, compression
└── favicon.ico, apple-touch-icon.png, robots.txt, site.webmanifest   (must stay in the root)
```

## How a page is built

```
kontakt.php ──► render_page('kontakt', $meta, $data)
                    │
                    ├─ app/views/pages/kontakt.php       page markup
                    └─ app/views/layout/base.php         wraps it: <head>, header, footer, scripts
                          └─ loads assets/css/{tokens,base,layout,components}.css
                             + assets/css/pages/kontakt.css
```

The four project pages (`gemeinde`, `ngobusiness`, `schulprojekte`, `diaspora`) share one template,
`app/views/pages/project.php`, and take their content from `app/data/projects.php`.
The main project (`'featured' => true`, currently Gemeinde-Aufklärung) opens the home page and
presents itself as five slides; the other projects show text and photos side by side.
Impressum and Datenschutz share `assets/css/pages/legal.css`.

## Common tasks

| I want to … | Edit |
|---|---|
| change colours, fonts, headline sizes | `assets/css/tokens.css` |
| change texts on a project page, its slides or its home card | `app/data/projects.php` |
| add or edit a team member | `app/data/team.php` |
| announce the next event | `app/data/event.php` (it disappears after `'date'`) |
| change IBAN, e-mail addresses, LinkedIn link, contact subjects | `app/config.php` |
| change texts on home, Kontakt, Spenden, Impressum, Datenschutz | `app/views/pages/<page>.php` |
| change navigation or footer | `app/views/layout/nav.php`, `footer.php` |
| change the title / description shown in Google | the page file in the root, e.g. `kontakt.php` |

**Adding a page:** create `foo.php` in the root (copy `spenden.php`), its markup in
`app/views/pages/foo.php`, optionally `assets/css/pages/foo.css`, and add it to `sitemap.php`.

**Adding a project:** add an entry to `app/data/projects.php` and a 2-line route file
(copy `diaspora.php`). Navigation, home cards, footer and sitemap pick it up automatically.

**Preselecting a contact subject:** link to `/kontakt.php?betreff=<key>` with a key from
`config('contact.subjects')`, e.g. `workshop` (plus `veranstaltung` while an event is upcoming).

## Photos

A photo is a name without width, e.g. `gemeinde/slide-1`, and lives in `assets/img/` as WebP files
named after their real pixel width: `gemeinde/slide-1-800.webp`, `gemeinde/slide-1-1600.webp`.
`image()` (in `app/lib/helpers.php`) turns all widths into one responsive `<img>` with `srcset`.

To replace a photo: export it as WebP in about 800 and 1600 px width (thumbnails: 192 × 192 px),
name the files like the ones you replace, and update `alt` / `credit` in the data file.
Details: `design/Design-Baseline.md`, section "Fotos austauschen".

## CSS conventions

- **Tokens first.** Components use variables from `tokens.css` instead of raw values.
- **One accent, one meaning.** A filled orange surface means *donate* (`.btn--donate`). Every other
  action is ink (`.btn--primary`) or an outline (`.btn--outline`). Orange text: one word per headline (`accent()`).
- **BEM naming:** `.block`, `.block__element`, `.block--modifier` — e.g. `.member__name`, `.page-hero--compact`.
- **State classes** start with `is-` and are set by JavaScript: `.is-visible`, `.is-active`, `.is-scrolled`, `.is-copied`.
- **JavaScript hooks** use `data-*` attributes (`data-team-gallery`, `data-copy`, …), so renaming a CSS class never breaks behaviour.
- **Scroll reveal:** add `fade-in` to an element, plus `delay-1` … `delay-4` to stagger it. Content stays visible without JavaScript and with reduced motion.
- **Breakpoints:** 600px (form rows), 900px (mobile → desktop), 1200px (chapter strip in one row, capsule team gallery).
- **Motion** always respects `prefers-reduced-motion`.
- Cascade order is tokens → base → layout → components → page, so page styles win over shared ones.

## Local development

```bash
php -S localhost:8000
# open http://localhost:8000
```

- `.htaccess` is not applied by the PHP dev server (no redirects, no headers, `app/` is not blocked locally).
- The contact form works up to sending; without a local mail server it shows the "Problem beim Senden" message.

## Deployment

The repository root is the web root. On the server:

- PHP **8.1 or newer** (8.1 is end-of-life — switch to 8.3+ in cPanel → MultiPHP).
- `app/` is blocked by `.htaccess` (root) and `app/.htaccess`; `design/`, `docs/` and `*.md` are blocked as well.
- CSS, JS and images are linked with `?v=<modification time>`, so browsers can cache them for a year and still get every update immediately.
