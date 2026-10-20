# disinfoawareness.eu

Website of **Disinfo Awareness**, a Vienna-based association raising awareness of disinformation and FIMI.
Plain PHP (8.1+), HTML, CSS and vanilla JavaScript. No build step, no dependencies to install.

## Structure

```
├── index.php, kontakt.php, …   Public pages. One file per URL: page meta + one render call.
├── sitemap.php                 XML sitemap (also served as /sitemap.xml)
│
├── app/                        Everything behind the pages. Not reachable from the web.
│   ├── bootstrap.php           Loaded first by every page
│   ├── config.php              Site settings: URLs, e-mail addresses, bank details, social links
│   ├── data/
│   │   ├── projects.php        The 4 project areas: home teasers + full project page content
│   │   └── team.php            Team members
│   ├── lib/                    PHP helpers (rendering, SEO, contact form, CSRF)
│   └── views/
│       ├── layout/             HTML frame: <head>, navigation, footer
│       ├── partials/           Reusable blocks: hero, CTA band, project card, team card
│       └── pages/              Markup of each page (project.php is shared by all 4 project pages)
│
├── assets/
│   ├── css/
│   │   ├── tokens.css          ★ Design tokens — colours, fonts, type scale. Start here.
│   │   ├── base.css            Reset, typography, scroll-reveal animation
│   │   ├── layout.css          Navigation, hero, split grid, footer
│   │   ├── components.css      Buttons, CTA band, form fields, alerts
│   │   └── pages/              One stylesheet per page type, loaded only on that page
│   ├── js/
│   │   ├── hero-canvas.js      three.js particle background of the hero
│   │   └── main.js             Scroll reveal, team cards, copy buttons
│   └── icons/                  App icons referenced by site.webmanifest
│
├── docs/                       Project notes (not served)
├── .htaccess                   HTTPS, redirects, security headers, caching, compression
└── favicon.ico, apple-touch-icon.png, robots.txt, site.webmanifest   (must stay in the root)
```

## How a page is built

```
kontakt.php ──► render_page('kontakt', $meta, $data)
                    │
                    ├─ app/views/pages/kontakt.php       page markup
                    └─ app/views/layout/base.php         wraps it: <head>, nav, footer, scripts
                          └─ loads assets/css/{tokens,base,layout,components}.css
                             + assets/css/pages/kontakt.css
```

The four project pages (`schulprojekte`, `ngobusiness`, `gemeinde`, `diaspora`) share one template,
`app/views/pages/project.php`, and take their content from `app/data/projects.php`.
Impressum and Datenschutz share `assets/css/pages/legal.css`.

## Common tasks

| I want to … | Edit |
|---|---|
| change colours, fonts, headline sizes | `assets/css/tokens.css` |
| change texts on a project page or its home teaser | `app/data/projects.php` |
| add or edit a team member | `app/data/team.php` |
| change IBAN, e-mail addresses, LinkedIn link, social preview image | `app/config.php` |
| change texts on home, Kontakt, Spenden, Impressum, Datenschutz | `app/views/pages/<page>.php` |
| change navigation or footer | `app/views/layout/nav.php`, `footer.php` |
| change the title / description shown in Google | the page file in the root, e.g. `kontakt.php` |

**Adding a page:** create `foo.php` in the root (copy `spenden.php`), its markup in
`app/views/pages/foo.php`, optionally `assets/css/pages/foo.css`, and add it to `sitemap.php`.

**Adding a project:** add an entry to `app/data/projects.php` and a 2-line route file
(copy `diaspora.php`). The home grid and the sitemap pick it up automatically.

## CSS conventions

- **Tokens first.** Components use variables from `tokens.css` instead of raw values.
- **BEM naming:** `.block`, `.block__element`, `.block--modifier` — e.g. `.team-card__name`, `.hero--project`.
- **State classes** start with `is-` and are set by JavaScript: `.is-visible`, `.is-expanded`, `.is-in-view`, `.is-copied`.
- **JavaScript hooks** use `data-*` attributes (`data-team-card`, `data-copy`, …), so renaming a CSS class never breaks behaviour.
- **Scroll reveal:** add `fade-in` to an element, plus `delay-1` … `delay-4` to stagger it.
- **Breakpoints:** 450px (compact nav), 900px (mobile → desktop), 1600px (team grid).
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
- `app/` is blocked by `.htaccess` (root) and `app/.htaccess`; `docs/` and `*.md` are blocked as well.
- CSS and JS are linked with `?v=<modification time>`, so browsers can cache them for a year and still get every update immediately.
