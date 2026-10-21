# Projektstand – disinfoawareness.eu

**Stand:** 20.10.2026
**Grundlage:** Vollständige Analyse des Repos (alle Dateien, alle Branches, komplette Git-Historie) plus Abgleich mit der Live-Seite (nur lesende Abrufe).

> **Nachtrag 20.10.2026 – Refactor auf `Design_Valentin`:** Codebasis neu strukturiert (`app/` mit Config, Daten, Views; zentrale Design-Tokens in `assets/css/tokens.css`; eine Vorlage für alle 4 Projektseiten). Aktuelle Struktur siehe **`README.md`** – die Architektur-Beschreibung in Abschnitt 3 ist damit überholt. Behobene Punkte sind unten mit ✅ markiert; sie werden live, sobald der Branch deployt ist.

> **Nachtrag 20.10.2026 – Redesign auf `Valentin_Redesign`:** Helles Design nach der Vorlage „Voices United“, Gemeinde-Aufklärung als Hauptprojekt, CEU-Veranstaltung. Entscheidungen und Design-System: **`design/Design-Baseline.md`**. Nebenbei erledigt aus Abschnitt 6:
> - Punkt 4 (teilweise): Google Fonts, three.js/unpkg, Unsplash und `hosting.disinfoconsulting.eu` werden nicht mehr geladen. Schriften, Bilder (Team, QR-Code, Projektfotos) und Skripte liegen im Repo, die CSP erlaubt nur noch die eigene Domain. Die Datenschutzerklärung selbst ist weiterhin zu überarbeiten.
> - Punkt 7: Skip-Link zurück, `prefers-reduced-motion` überall berücksichtigt, Einblendungen bleiben ohne JavaScript sichtbar, Kontraste nach WCAG AA, Team-Akkordeon durch eine zugängliche Galerie ersetzt
> - Punkt 9 (teilweise): Bilder liegen nicht mehr bei Disinfo Consulting (Kontaktmails weiterhin)
> - Punkt 15: three.js entfernt, Fotos als WebP mit `srcset` und Lazy Loading
> - Punkt 16: Team als Kapsel-Galerie statt unausgewogenem Raster; LinkedIn im Footer zeigt auf die Vereinsseite (URL noch bestätigen)

---

## TL;DR

- **Was:** Website des Wiener Vereins *Disinfo Awareness* (Aufklärung über Desinformation/FIMI). Statische Seiten mit etwas PHP, kein Build-Prozess, gehostet auf cPanel/LiteSpeed.
- **`main` entspricht dem Live-Stand.** Live lief monatelang der ungemergte Branch `refactor_v1` (PHP-Umbau, letzter Commit 22.06.2026). Am 20.10.2026 wurde er per PR #7 nach `main` gemergt. Aktiver Arbeitsbranch ist `Design_Valentin`.
- **Live gerade kaputt:** der **QR-Code auf der Spendenseite** (404), das **Social-Media-Vorschaubild** auf allen Seiten (404) und zwei Favicons (404).
- **Größte offene Baustellen:** Die Datenschutzerklärung ist veraltet und unvollständig, im Impressum fehlt eine E-Mail-Adresse, die NGO-Business-Seite verspricht Daten, zeigt aber keine, und die Barrierefreiheit ist zurückgegangen (Skip-Link entfernt, schwache Kontraste).
- **Seit dem 22.06.2026 gab es keine Commits mehr.**

---

## 1. Worum es geht

**Verein:** Disinfo Awareness – Verein zur Aufklärung über Desinformation und FIMI zur Stärkung der Informationsresilienz
ZVR 1154237575 · Staudingergasse 8/6, 1200 Wien · gemeinnützig, ohne staatliche Kernfinanzierung (laut Spendenseite)

**Mission (laut Website):** Gesellschaftliche Resilienz gegen Desinformation stärken – durch niedrigschwellige Aufklärung, Workshops und Gegennarrative, gezielt auch abseits urbaner, akademischer Zielgruppen.

**Vier Arbeitsfelder (seit der Neuausrichtung im Juni 2026):**

| Feld | Kern | Call-to-Action |
|---|---|---|
| **NGO-Business** | Analyse einer Kampagne, die parlamentarische Anfragen der FPÖ gegen den Zivilsektor nutzt | Kontakt aufnehmen |
| **Schulprojekte** | Workshops „mehr als Media Literacy“, 2–4 h, ab der 5. Schulstufe, österreichweit | Workshop anfragen |
| **Gemeinde-Aufklärung** | Multiplikator:innen im ländlichen Raum schulen (Vereine, Bürgermeister:innen, Gemeinderäte) | Anfrage senden |
| **Diaspora-Aufklärung** | Mehrsprachige, kultursensible Formate mit Community-Organisationen | Kooperation anfragen |

**Team (live, 5 Personen):**

| Name | Rolle |
|---|---|
| Markus Schwinghammer | Gründer & Obmann |
| Mag. Robert Buchhaus | Gründer & Obmann-Stellvertreter (Fundraising, NGO-Kooperationen) |
| Ivana Damjanovic | Projektmanagement & Gender |
| Valentin Meixner | Projektmanagement & Workshops |
| Laura Pattiss | Projektmanagement & Art (seit 09.06.2026) |

**Entwicklung:** Fast alles stammt von Markus (48 Commits plus 7 Merges über den GitHub-Account `TheVibiestVibeCoder`). Dazu kommen 8 Commits von Claude Code (SEO, Barrierefreiheit, Performance im Jänner 2026).
Repo: `github.com/TheVibiestVibeCoder/disinfo_awareness`

---

## 2. Seiten & Status (live)

| Seite (live) | Zweck | Status / Auffälligkeiten |
|---|---|---|
| `/` (index.php) | Hero, 4 Projektkarten, Funding-Teaser, Team-Akkordeon | Läuft. Bei 5 Teamkarten im 2er-/4er-Raster bleibt eine Karte allein in der letzten Zeile |
| `/schulprojekte.php` | Projektseite | Läuft |
| `/ngobusiness.php` | Projektseite | Verspricht „datengetrieben, quellenbasiert“, enthält aber **keine Daten und keine Quellen** |
| `/gemeinde.php` | Projektseite | Läuft |
| `/diaspora.php` | Projektseite | Läuft |
| `/spenden.php` | Banküberweisung: IBAN/BIC/Verwendungszweck mit Kopier-Buttons, QR-Code | **QR-Code-Bild 404** |
| `/kontakt.php` | Kontaktformular (PHP `mail()`) | Läuft, mit CSRF, Honeypot und Rate-Limit abgesichert |
| `/impressum.php` | Vereinsdaten, Vertretung, Haftung, Bildnachweise | **Keine E-Mail-Adresse**, Meta-Description nennt „§5 TMG“ (deutsches Recht) |
| `/datenschutz.php` | Datenschutzerklärung | **Veraltet/unvollständig** (siehe Abschnitt 6) |
| `/sitemap.php` bzw. `/sitemap.xml` | XML-Sitemap | Aktuell, listet alle 9 Seiten |
| `*.html` | – | Leiten per 301 auf `.php` um |

**Frühere Seiten (am 02.06.2026 gelöscht):** `aufklaerung.html` („Projekt 2026 – Resilienz im ländlichen Raum“), `pim.html` („Positive Info Manipulation“, wurde zu `ngobusiness`), `innovation.html` („Innovation Lab / PIM Lab“). Der Inhalt der Aufklärungsseite lebt teilweise in `gemeinde` weiter.

---

## 3. Technik

### Stack
- **HTML/CSS/Vanilla-JS**, **PHP 8.1** (cPanel-Handler `ea-php81`), Server **LiteSpeed**. Beide Domains (`disinfoawareness.eu`, `disinfoconsulting.eu`) laufen auf derselben IP.
- **three.js 0.160** über das CDN `unpkg.com` (Importmap) liefert die Partikel-Animation im Hero **jeder** Seite.
- **Google Fonts:** Bebas Neue (Headlines) und Manrope (Fließtext), extern geladen.
- **Bilder:** alle extern, entweder Unsplash (Kartenhintergründe) oder `hosting.disinfoconsulting.eu` (WordPress der Disinfo Consulting: Teamfotos, QR, OG-Bild). Im Repo liegen nur Favicons.
- Kein Build, kein Paketmanager, keine Tests, keine CI.

### Designsprache
Dunkel (`#050505`), weiße Bebas-Neue-Headlines in Versalien, feine Rasterlinien (`rgba(255,255,255,.15)`), Bilder in Graustufen, die bei Hover oder im Viewport in Farbe übergehen, Fade-in beim Scrollen, Partikel-Hero mit Maus- bzw. Gyro-Parallax. Gestaltet wie ein hochwertiges Kampagnen-Microsite.

### Architektur: vor und nach dem PHP-Umbau

```
bis PR #6 (alt)                         seit refactor_v1 / PR #7 (= main = live)
├── index.html          ~1060 Zeilen    ├── index.php
├── schulprojekte.html  ┐               ├── schulprojekte.php  ┐ je ~80 Zeilen,
├── ngobusiness.html    │ je ~425 Z.,   ├── ngobusiness.php    │ nur Inhalt
├── gemeinde.html       │ CSS + three.js├── gemeinde.php       │
├── diaspora.html       ┘ dupliziert    ├── diaspora.php       ┘
├── impressum.html / datenschutz.html   ├── impressum.php / datenschutz.php
├── kontakt.php   (unsicher)            ├── kontakt.php   (gehärtet)
├── spenden.php                         ├── spenden.php
│                                       ├── includes/ head.php, nav.php, footer.php,
│                                       │            project-page-head.php
│                                       ├── assets/css/main.css
│                                       ├── assets/js/animation.js  (three.js-Hero)
│                                       ├── assets/js/ui.js         (Fade-in, Akkordeon, Copy)
│                                       └── .user.ini (display_errors=Off)
```

Früher kopierte jede Seite das komplette CSS und das three.js-Script. Der Umbau lagert das in gemeinsame Dateien aus: rund 1.800 Zeilen kamen dazu, rund 4.850 fielen weg. Seitenspezifisches CSS steht dort pro Seite in `$extra_head`.

### Server-Konfiguration (`.htaccess`)
- HTTPS-Zwang, Weiterleitung von `www` auf die Domain ohne `www`, Entfernen von abschließenden Slashes, Rewrite von `sitemap.xml` auf `sitemap.php`
- Brotli/Gzip (live geprüft: `Content-Encoding: br` aktiv), Caching (Bilder 1 Jahr, CSS/JS 1 Woche, HTML 1 Stunde)
- **Seit dem Umbau:** HSTS, CSP, `X-Frame-Options: DENY`, Permissions-Policy, Sperre für `.git`, `.claude`, Dotfiles, `optimize-images.php` und `PERFORMANCE_OPTIMIERUNGEN.md`, 301-Weiterleitungen von `.html` auf `.php`
- Die WebP-Content-Negotiation bewirkt nichts, weil keine Bilder lokal liegen

### Kontaktformular
- Sendet an **`kontakt@disinfoconsulting.eu`**. Im Schema.org-Markup steht dagegen `kontakt@disinfoawareness.eu`.
- Alte Version (bis PR #6): Header-Injection über Name und Betreff möglich, Absender war die Adresse der Besucher:in (Spam-/DMARC-Probleme), kein Spam-Schutz.
- Aktuell: CSRF-Token, Honeypot-Feld `website`, maximal 3 Nachrichten pro 10 Minuten und Session, feste Betreff-Whitelist, feste From-Adresse plus `Reply-To`. Dadurch wird ein Session-Cookie gesetzt.

### Spenden
Reine Banküberweisung mit IBAN, BIC, Verwendungszweck, Kopier-Buttons und QR-Code. Am 08.06.2026 gab es kurz eine **Stripe-Variante** (Monatsabo 5/10/15 €), die schon am 09.06. wieder durch die Überweisungsvariante ersetzt wurde. Aus dieser Zeit stammen die `.env`/Stripe-Einträge in der `.gitignore`. In der Historie sind keine Keys gelandet (geprüft).

---

## 4. Git- & Branch-Situation

| Branch (Remote) | Commit | Stand | Bemerkung |
|---|---|---|---|
| `main` | `8ab2158` (20.10.2026) | **= live** | Merge von PR #7 (`refactor_v1`) |
| `Design_Valentin` | `8ab2158` | = `main` | Aktiver Arbeitsbranch |

`refactor_v1` und `Design_UE1` gibt es auf dem Remote nicht mehr. Lokal existiert `Design_UE1` noch auf dem alten Stand `7bc002d` und kann gelöscht werden.

**Was der Umbau (`refactor_v1`, gemergt mit PR #7) gegenüber dem alten Stand gebracht hat:**
1. Umstellung von HTML auf PHP mit Includes, gemeinsames CSS/JS
2. Security-Header, Dotfile-Sperren, `.html`→`.php`-Redirects, `.user.ini`
3. Gehärtetes Kontaktformular
4. Korrigierte Sitemap (alle aktuellen Seiten)
5. Neues Teammitglied Laura Pattiss
6. Bild-URLs von `disinfoconsulting.eu` auf `hosting.disinfoconsulting.eu` umgestellt (die alten URLs liefern alle 404)
7. Skip-Link entfernt (Commit „Weißer Streifen weg“, weil er als weißer Balken sichtbar wurde)

**Lehre daraus:** Vier Monate lang war `main` nicht der Live-Stand. Ein Deploy von `main` hätte in dieser Zeit die Seite zurückgeworfen (kaputte Teamfotos, Laura fehlt, Sicherheitsfixes weg). In Zukunft sollte live nur gehen, was über einen PR in `main` gelandet ist.

**Deployment-Weg:** Im Repo nicht dokumentiert. Die `.htaccess`-Sperre für `.git` und `.claude` deutet darauf hin, dass ein Git-Checkout direkt im Webroot liegt (z. B. cPanel Git Version Control oder `git pull` auf dem Server).

### Chronik
| Datum | Was |
|---|---|
| 14.01.2026 | Initial Upload und Go-live (index, aufklaerung, pim, innovation, kontakt, impressum, datenschutz) |
| 14.–15.01. | Design-Updates, Budget-Rechner, neue Teammitglieder (PR #1) |
| 21.–22.01. | Claude-PRs: SEO-Grundlagen und Barrierefreiheit (#2), Performance/`.htaccess` (#3), `seo-config.php` (#4), Budget-Rechner entfernt (#5) |
| 02.06. | **Neuausrichtung:** Aufklärung/Innovation gelöscht, PIM wird NGO-Business, neu: Schulprojekte, Gemeinde, Diaspora |
| 08.06. | Spendenseite mit Stripe |
| 09.06. | Stripe ersetzt durch Banküberweisung + QR, PR #6 nach `main` gemergt. **Am selben Tag** entsteht `refactor_v1` (PHP-Umbau, Security, Laura) |
| 22.06. | `refactor_v1`: Bild-URLs auf `hosting.…` umgestellt |
| 20.10. | PR #7: `refactor_v1` nach `main` gemergt. Neuer Arbeitsbranch `Design_Valentin` |

---

## 5. Live-Check vom 20.10.2026

| Prüfung | Ergebnis |
|---|---|
| Live-Seite entspricht | `refactor_v1` @ `69e633f`, inhaltlich identisch mit dem heutigen `main` (Teamfotos, Laura, CSP inkl. `hosting.…`, Sitemap) |
| Teamfotos (`hosting.disinfoconsulting.eu`) | ✅ 200 |
| Unsplash-Bilder (13 URLs) | ✅ alle 200 |
| **QR-Code Spendenseite** (`disinfoconsulting.eu/…/Bank_QR.jpeg`) | ❌ **404**, unter `hosting.disinfoconsulting.eu/…` liegt er mit 200 |
| **OG/Twitter-Bild + Schema-Logo** (`disinfoconsulting.eu/…/Gemini_…gsrv.png`) | ❌ **404** auf allen Seiten, unter `hosting.…` 200 |
| `favicon-16x16.png`, `favicon-32x32.png` | ❌ 404 (werden verlinkt, existieren aber nicht) |
| `site.webmanifest` | ⚠️ Standard-Template („MyWebSite“, weißes Theme, verweist auf nicht existierende Icons) |
| `.git/`, `optimize-images.php`, `PERFORMANCE_OPTIMIERUNGEN.md` | ✅ 403 (gesperrt) |
| `/htaccess` (ohne Punkt), `/includes/*.php`, `/seo-config.php` | ⚠️ öffentlich erreichbar (harmlos, aber unnötig) |
| Security-Header | ✅ HSTS, CSP, X-Frame-Options DENY, Permissions-Policy |
| Kompression | ✅ Brotli |
| PHP-Version | ⚠️ 8.1, seit 31.12.2025 ohne Sicherheitsupdates (End of Life) |

---

## 6. Bekannte Probleme & offene Punkte

### 🔴 Sofort
1. ~~**QR-Code auf der Spendenseite ist kaputt.**~~ ✅ URL auf `hosting.disinfoconsulting.eu` umgestellt (`app/config.php` → `bank.qr_image`). Offen: Bild lokal ablegen.
2. ~~**Branch-Chaos:** `refactor_v1` war Produktion, aber nicht `main`.~~ ✅ Erledigt mit PR #7 am 20.10.2026.
3. ~~**OG-Bild/Logo 404**~~ ✅ Auf `hosting.…` umgestellt (`app/config.php` → `seo.og_image`, gilt auch für das Schema.org-Logo).

### 🟠 Wichtig
4. **Datenschutzerklärung** deckt die tatsächliche Verarbeitung nicht ab (rechtlich prüfen lassen):
   - Nicht erwähnt: Google Fonts, unpkg (three.js), Unsplash und `hosting.disinfoconsulting.eu`. Bei jedem Seitenaufruf geht die IP-Adresse an diese Dritten.
   - Hosting-Provider, Verantwortlicher mit Anschrift und Empfänger der Kontaktmails (Disinfo Consulting) fehlen
   - Cookies sind nur allgemein beschrieben. Tatsächlich gibt es nur das technisch notwendige Session-Cookie auf `/kontakt.php`.
   - „PDF-Zusendung“ gibt es nicht mehr. „TKG 2003“ ist veraltet (heute TKG 2021).
   - *Tipp:* Fonts und three.js selbst hosten. Dann fallen die meisten Drittübermittlungen weg, und die CSP lässt sich verschärfen.
5. **Impressum:** Es fehlt eine E-Mail-Adresse (ein Kontaktformular allein reicht nach ECG voraussichtlich nicht). Die Meta-Description nennt „§5 TMG“ statt ECG.
6. **NGO-Business-Seite:** Sie macht konkrete Aussagen über eine Partei („koordinierte Kampagne“, „Stigmatisierung“) und verspricht „quellenbasiert, transparent“, verlinkt aber weder Daten noch Quellen. Das ist inhaltlich und rechtlich die heikelste Seite.
7. **Barrierefreiheit:**
   - Der Skip-Link wurde ersatzlos entfernt. Er sollte als „visually hidden“-Variante zurückkommen, statt `top:-40px`.
   - Kontraste unter WCAG AA: `#444` im Footer-Copyright (~2:1), `#555` bei QR-Hinweis und Feldlabels (~2,7:1), `#666` bei Labels (~3,5:1)
   - Keine Unterstützung für `prefers-reduced-motion` (Partikel, Fade-ins, Zoom)
   - Team-Akkordeon ohne `aria-expanded`/`aria-controls`
   - `.fade-in`-Inhalte bleiben unsichtbar, wenn JavaScript nicht lädt
8. **Glaubwürdigkeit:** Die Dateinamen `Gemini_Generated_Image_…` deuten darauf hin, dass zwei Team-Porträts (Robert, Valentin) und das OG-Bild KI-generiert oder -bearbeitet sind. Für einen Verein gegen Desinformation ist das ein Angriffspunkt. Besser echte Fotos verwenden oder transparent kennzeichnen.
9. **Abhängigkeit von Disinfo Consulting:** Bilder liegen im WordPress der Consulting-Firma, Kontaktmails gehen an deren Domain. Ein Umzug dort hat schon einmal alle Bilder gebrochen. Ziel: Assets im Repo, Mails an `@disinfoawareness.eu`.
10. **PHP 8.1 ist End of Life.** In cPanel (MultiPHP) auf 8.3 oder 8.4 umstellen. Der Code ist kompatibel.

### 🟡 Aufräumen / Qualität
11. ~~**Toter Code und Altlasten:**~~ ✅ Alles entfernt bzw. bereinigt (`.htaccess` neu geschrieben, `site.webmanifest` und Favicon-Links korrigiert):
    - `seo-config.php` wird nirgends eingebunden und verweist auf gelöschte Seiten
    - `sitemap_index.xml` ist redundant
    - `htaccess` ohne Punkt ist ein cPanel-Überbleibsel
    - `optimize-images.php` zielt auf Ordner, die es nicht gibt
    - `PERFORMANCE_OPTIMIERUNGEN.md` hat veraltete Zeilenangaben, und die WebP-Logik greift nicht
    - Stripe-Einträge in der `.gitignore`
    - `<meta name="keywords">` wird von Suchmaschinen ignoriert
12. ~~Sitemap listet gelöschte Seiten.~~ ✅ Mit PR #7 behoben.
13. **Uneinheitliche Ansprache:** Meist „Sie“, aber auf Spenden „Unterstütze/Scanne“, auf Schulprojekte „zu euch“, auf Kontakt „Lass uns sprechen“.
14. ~~**Absolute URLs** in Navigation und Footer.~~ ✅ Interne Links sind jetzt root-relativ (`/kontakt.php`).
15. **Performance:** *(teilweise ✅: Animation pausiert außerhalb des Sichtbereichs, Teamfotos mit `loading="lazy"`, CSS/JS mit Cache-Busting und 1 Jahr Cache)* three.js (~250 KiB komprimiert) wird auf jeder Seite geladen. Die Animationsschleife läuft weiter, auch wenn der Hero nicht mehr sichtbar ist (Akku, CPU). Teamfotos sind teils mehrere MB groß und haben kein `srcset`/`loading="lazy"`.
16. **Kleinkram:**
    - Bei 5 Teamkarten wirkt das Raster unausgewogen
    - Der Footer-Link „LinkedIn“ zeigt auf Markus' privates Profil statt auf eine Vereinsseite
    - Ob `@disinfoawareness` auf X/Twitter existiert, ist ungeklärt
    - Commit-Messages wie „Update 2“ sind nicht aussagekräftig
    - ~~Es gibt kein README~~ ✅

---

## 7. Empfohlene nächste Schritte

1. ~~**Branches bereinigen:** `refactor_v1` → `main` mergen.~~ ✅ Erledigt (PR #7). Offen ist nur noch, den lokalen Branch `Design_UE1` zu löschen.
2. **Hotfix (ca. 15 Minuten):** QR-Code- und OG-Bild-URLs auf `hosting.disinfoconsulting.eu` umstellen. Fehlende Favicons ergänzen oder die Links entfernen, `site.webmanifest` korrigieren.
3. **Assets ins Repo holen:** Bilder optimiert (WebP plus `srcset`) unter `assets/img/` ablegen, Fonts und three.js selbst hosten.
4. **Rechtstexte überarbeiten:** Datenschutz (Punkt 4) und Impressum (Punkt 5) aktualisieren und von jemandem mit Rechtskenntnis gegenlesen lassen.
5. **Barrierefreiheit wiederherstellen:** Punkt 7 umsetzen.
6. **Inhalte:** NGO-Business mit echter Analyse und Quellen füllen (oder vorerst als „in Arbeit“ kennzeichnen), Ansprache vereinheitlichen, Teamfotos prüfen.
7. **Aufräumen:** Punkt 11 umsetzen und ein README mit Deploy-Prozess und lokalem Setup schreiben.
8. **Hosting:** PHP-Version hochziehen.

---

## 8. Lokal arbeiten

```bash
git fetch origin
git switch main                 # bzw. eigener Feature-Branch davon
php -S localhost:8000           # PHP-Includes funktionieren damit lokal
# http://localhost:8000/
```

Hinweise:
- `.htaccess` greift beim PHP-Dev-Server nicht. Die `.html`-Redirects lassen sich lokal also nicht testen.
- `kontakt.php` ruft `mail()` auf. Lokal schlägt das ohne Mail-Setup fehl, das Formular zeigt dann die Fehlermeldung.
