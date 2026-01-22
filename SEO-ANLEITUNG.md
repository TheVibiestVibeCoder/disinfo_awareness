# SEO Metadata Konfiguration - Anleitung

## 📋 Übersicht

Die Datei **`seo-config.php`** ist Ihre zentrale Konfigurationsdatei für alle SEO-relevanten Einstellungen:

- ✅ **Meta Descriptions** für Google-Suchergebnisse
- ✅ **Open Graph Tags** für Facebook, LinkedIn, WhatsApp
- ✅ **Twitter Card Tags** für Twitter/X
- ✅ **Tab Icons** (Favicons) für Browser
- ✅ **Canonical URLs** zur Vermeidung von Duplicate Content
- ✅ **Schema.org strukturierte Daten** für Rich Snippets
- ✅ **Robots Meta Tags** zur Suchmaschinen-Steuerung

---

## 🚀 Schnellstart: Einbindung in HTML-Seiten

### Schritt 1: HTML-Datei zu PHP konvertieren

Ihre HTML-Dateien müssen `.php`-Dateien werden, um PHP-Code ausführen zu können:

```bash
# Beispiel: index.html → index.php
mv index.html index.php
```

**ODER:** Sie können die Dateien als `.html` belassen und in `.htaccess` PHP-Parsing für HTML-Dateien aktivieren:

```apache
# In .htaccess hinzufügen:
<FilesMatch "\.(html)$">
    SetHandler application/x-httpd-php
</FilesMatch>
```

### Schritt 2: SEO-Config einbinden

Fügen Sie am Anfang jeder Seite (nach dem `<?php`-Tag) folgende Zeile ein:

```php
<?php require_once 'seo-config.php'; ?>
```

### Schritt 3: Meta-Tags im `<head>` einfügen

Ersetzen Sie in Ihrem `<head>`-Bereich die alten Meta-Tags durch:

```html
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php render_complete_seo('index.php'); ?>

    <!-- Ihre anderen Head-Inhalte (CSS, Fonts, etc.) -->
</head>
```

**Wichtig:** Ersetzen Sie `'index.php'` durch den jeweiligen Dateinamen:
- Homepage: `'index.php'` oder `'index.html'`
- Aufklärung: `'aufklaerung.html'`
- PIM: `'pim.html'`
- Innovation: `'innovation.html'`
- Kontakt: `'kontakt.php'`

---

## ⚙️ Konfiguration anpassen

### Globale Einstellungen (für alle Seiten)

Öffnen Sie `seo-config.php` und bearbeiten Sie den Abschnitt **`$seo_global`**:

```php
$seo_global = [
    'site_name' => 'Disinfo Awareness',  // ← Ihr Website-Name
    'site_url' => 'https://disinfoawareness.eu',  // ← Ihre Domain

    // Standard-Bild für Social Media (1200×630px empfohlen)
    'default_og_image' => 'https://disinfoawareness.eu/images/og-default.jpg',

    // Tab Icons (erstellen Sie diese Dateien!)
    'favicon_ico' => '/favicon.ico',
    'apple_touch_icon' => '/apple-touch-icon.png',

    // Social Media Profile
    'twitter_handle' => '@disinfoawareness',  // ← Ihr Twitter-Handle
    'facebook_page' => '',  // ← Ihre Facebook-Seite (falls vorhanden)

    // Theme-Farbe (wird in Browser-UI angezeigt)
    'theme_color' => '#050505',  // ← Ihre Hauptfarbe
];
```

### Seiten-spezifische Einstellungen

Bearbeiten Sie den Abschnitt **`$seo_pages`** für jede Seite:

```php
$seo_pages = [
    'index.html' => [
        'title' => 'Disinfo Awareness – Gegen Desinformation',  // ← Seitentitel (max. 60 Zeichen)
        'description' => 'Ihre Beschreibung hier...',  // ← Meta Description (max. 160 Zeichen)
        'keywords' => 'Desinformation, Fake News, ...',  // ← Keywords (kommagetrennt)
        'og_image' => 'https://disinfoawareness.eu/images/og-homepage.jpg',  // ← Seiten-spezifisches Bild
        'canonical' => 'https://disinfoawareness.eu/',  // ← Kanonische URL
    ],

    // Weitere Seiten...
];
```

---

## 🖼️ Favicon & Tab Icons erstellen

### Benötigte Dateien

Erstellen Sie folgende Icon-Dateien und laden Sie sie ins Root-Verzeichnis hoch:

| Datei | Größe | Verwendung |
|-------|-------|------------|
| `favicon.ico` | 16×16, 32×32, 48×48 | Browser-Tab (klassisch) |
| `favicon-16x16.png` | 16×16 | Browser-Tab (modern) |
| `favicon-32x32.png` | 32×32 | Browser-Tab (modern) |
| `apple-touch-icon.png` | 180×180 | iOS Home Screen |
| `android-chrome-192x192.png` | 192×192 | Android Home Screen |
| `android-chrome-512x512.png` | 512×512 | Android Splash Screen |

### Online-Generatoren (empfohlen)

1. **RealFaviconGenerator**: https://realfavicongenerator.net/
   - Laden Sie Ihr Logo (mindestens 512×512px)
   - Generiert automatisch alle benötigten Formate
   - Download-Paket enthält alle Dateien + `site.webmanifest`

2. **Favicon.io**: https://favicon.io/
   - Einfacher Generator
   - Unterstützt Text-to-Icon, PNG-to-Icon, Emoji-to-Icon

### Web App Manifest (`site.webmanifest`)

Erstellen Sie die Datei `site.webmanifest` im Root-Verzeichnis:

```json
{
  "name": "Disinfo Awareness",
  "short_name": "Disinfo",
  "description": "Gegen Desinformation im ländlichen Raum",
  "start_url": "/",
  "display": "standalone",
  "background_color": "#050505",
  "theme_color": "#050505",
  "icons": [
    {
      "src": "/android-chrome-192x192.png",
      "sizes": "192x192",
      "type": "image/png"
    },
    {
      "src": "/android-chrome-512x512.png",
      "sizes": "512x512",
      "type": "image/png"
    }
  ]
}
```

---

## 🌐 Social Media Bilder (Open Graph Images)

### Anforderungen

- **Größe:** 1200×630 Pixel (Mindestens 600×315)
- **Format:** JPG oder PNG (unter 8 MB)
- **Seitenverhältnis:** 1.91:1
- **Text:** Groß und lesbar (auch auf Mobilgeräten)

### Empfohlene Bilder

Erstellen Sie für jede Hauptseite ein eigenes OG-Image:

```
/images/og-default.jpg       ← Fallback-Bild (allgemein)
/images/og-homepage.jpg      ← Homepage
/images/og-aufklaerung.jpg   ← Projekt 2026
/images/og-pim.jpg           ← PIM-Seite
/images/og-innovation.jpg    ← Innovation Lab
/images/og-kontakt.jpg       ← Kontakt
```

### Design-Tools

- **Canva** (kostenlos): https://www.canva.com/
  - Template: "Facebook Post" (1200×630)
- **Figma** (kostenlos): https://figma.com/
- **Photoshop/GIMP**: Eigenes Design

### Testen

Testen Sie Ihre OG-Images mit:
- **Facebook Debugger**: https://developers.facebook.com/tools/debug/
- **Twitter Card Validator**: https://cards-dev.twitter.com/validator
- **LinkedIn Post Inspector**: https://www.linkedin.com/post-inspector/

---

## 📊 Was wird in Google angezeigt?

### Google-Suchergebnis besteht aus:

1. **Blauer Link (Title Tag):**
   ```
   Disinfo Awareness – Gegen Desinformation im ländlichen Raum
   ```
   → Wird aus `'title'` in `seo-config.php` generiert

2. **URL (grün/grau):**
   ```
   https://disinfoawareness.eu › aufklaerung
   ```
   → Automatisch von Google aus `canonical` generiert

3. **Beschreibung (Description):**
   ```
   Disinfo Awareness bekämpft Desinformation in ländlichen Regionen
   durch Aufklärung, innovative Strategien und nachhaltige...
   ```
   → Wird aus `'description'` in `seo-config.php` generiert

4. **Rich Snippets (optional):**
   - Sternebewertungen
   - FAQ-Boxen
   - Breadcrumbs
   → Werden aus Schema.org-Daten generiert

---

## 🔧 Erweiterte Funktionen

### Nur einzelne Komponenten einbinden

Falls Sie nicht alle SEO-Tags benötigen:

```php
<?php
require_once 'seo-config.php';

// Nur Meta-Tags (ohne Favicon & Schema.org)
render_seo_meta_tags('index.html');

// Nur Favicons
render_favicon_tags();

// Nur Schema.org Daten
render_schema_org('index.html');

// Oder alles zusammen:
render_complete_seo('index.html');
?>
```

### Variablen in PHP-Code nutzen

```php
<?php
require_once 'seo-config.php';
$page_title = get_page_title('index.html');
$page_desc = get_page_description('index.html');
?>

<h1><?php echo $page_title; ?></h1>
<p><?php echo $page_desc; ?></p>
```

---

## ✅ Checkliste: Nach der Implementierung

- [ ] Alle HTML-Dateien zu PHP konvertiert (oder `.htaccess` angepasst)
- [ ] `seo-config.php` in jede Seite eingebunden
- [ ] `render_complete_seo()` im `<head>` eingefügt
- [ ] Alle Texte und URLs in `seo-config.php` angepasst
- [ ] Favicon-Dateien erstellt und hochgeladen
- [ ] `site.webmanifest` erstellt
- [ ] Open Graph Bilder (1200×630px) erstellt
- [ ] Seite testen mit:
  - [ ] Facebook Debugger
  - [ ] Twitter Card Validator
  - [ ] Google Rich Results Test: https://search.google.com/test/rich-results
  - [ ] Schema.org Validator: https://validator.schema.org/
- [ ] Neue Sitemap in Google Search Console eingereicht

---

## 🐛 Häufige Probleme & Lösungen

### Problem: PHP-Code wird als Text angezeigt

**Lösung:**
- Prüfen Sie, ob die Datei `.php`-Endung hat
- Oder aktivieren Sie PHP für HTML in `.htaccess`

### Problem: "Call to undefined function render_seo_meta_tags()"

**Lösung:**
- Prüfen Sie, ob `require_once 'seo-config.php';` am Anfang der Datei steht
- Prüfen Sie den Dateipfad (relative Pfade beachten!)

### Problem: Open Graph Bild wird nicht angezeigt

**Lösung:**
- Bild muss ABSOLUTEN URL haben (mit `https://`)
- Bild darf nicht größer als 8 MB sein
- Cache leeren: Facebook Debugger → "Scrape Again"

### Problem: Favicon wird nicht angezeigt

**Lösung:**
- Browser-Cache leeren (Strg+Shift+R / Cmd+Shift+R)
- Prüfen, ob Dateien im Root-Verzeichnis liegen
- Prüfen, ob Dateien per URL erreichbar sind:
  `https://disinfoawareness.eu/favicon.ico`

---

## 📞 Support & Weitere Informationen

- **Google Search Console:** https://search.google.com/search-console
- **Schema.org Dokumentation:** https://schema.org/docs/schemas.html
- **Open Graph Protokoll:** https://ogp.me/
- **Twitter Cards Docs:** https://developer.twitter.com/en/docs/twitter-for-websites/cards

---

**Viel Erfolg mit Ihrer SEO-Optimierung! 🚀**
