# Beispiel: SEO-Integration in index.html

## 📝 VORHER (Aktuell)

```html
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Disinfo Awareness - Gemeinsam gegen Desinformation</title>
    <meta name="theme-color" content="#050505">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- Rest des Head-Bereichs -->
</head>
```

**Probleme:**
- ❌ Keine Meta Description (Google zeigt zufälligen Text an)
- ❌ Kein Favicon (kein Tab-Icon sichtbar)
- ❌ Keine Open Graph Tags (kein Vorschaubild bei Facebook/WhatsApp)
- ❌ Keine Twitter Card Tags
- ❌ Keine Canonical URL
- ❌ Keine Schema.org Daten

---

## ✅ NACHHER (Mit SEO-Config)

### Option 1: Datei zu .php konvertieren (empfohlen)

**Schritt 1:** Datei umbenennen

```bash
mv index.html index.php
```

**Schritt 2:** PHP-Code einfügen

```php
<?php require_once 'seo-config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php render_complete_seo('index.php'); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Rest des Head-Bereichs -->
</head>
```

**Schritt 3:** In `.htaccess` Rewrite-Regel hinzufügen

```apache
# Redirect index.html zu index.php (falls jemand alte URL aufruft)
RewriteRule ^index\.html$ /index.php [R=301,L]
```

---

### Option 2: .html Datei behalten

Falls Sie die `.html`-Endung behalten möchten:

**Schritt 1:** `.htaccess` anpassen (PHP für HTML aktivieren)

```apache
# Am Anfang der .htaccess Datei hinzufügen:
<FilesMatch "\.(html)$">
    SetHandler application/x-httpd-php
</FilesMatch>
```

**Schritt 2:** PHP-Code in index.html einfügen

```php
<?php require_once 'seo-config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php render_complete_seo('index.html'); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- Rest des Head-Bereichs -->
</head>
```

---

## 🔍 Was wird generiert?

Wenn Sie `<?php render_complete_seo('index.html'); ?>` aufrufen, wird folgender HTML-Code ausgegeben:

```html
    <!-- SEO Meta Tags -->
    <title>Disinfo Awareness – Gegen Desinformation im ländlichen Raum</title>
    <meta name="description" content="Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!">
    <meta name="keywords" content="Desinformation, Fake News, ländlicher Raum, Medienkompetenz, Aufklärung, Demokratie">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://disinfoawareness.eu/">
    <meta name="language" content="de">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Disinfo Awareness – Gegen Desinformation im ländlichen Raum">
    <meta property="og:description" content="Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!">
    <meta property="og:url" content="https://disinfoawareness.eu/">
    <meta property="og:site_name" content="Disinfo Awareness">
    <meta property="og:locale" content="de_DE">
    <meta property="og:image" content="https://disinfoawareness.eu/images/og-homepage.jpg">
    <meta property="og:image:alt" content="Disinfo Awareness – Gegen Desinformation">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Disinfo Awareness – Gegen Desinformation im ländlichen Raum">
    <meta name="twitter:description" content="Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!">
    <meta name="twitter:image" content="https://disinfoawareness.eu/images/og-homepage.jpg">
    <meta name="twitter:image:alt" content="Disinfo Awareness – Gegen Desinformation">
    <meta name="twitter:site" content="@disinfoawareness">
    <meta name="twitter:creator" content="@disinfoawareness">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#050505">
    <meta name="msapplication-TileColor" content="#050505">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Disinfo Awareness",
      "url": "https://disinfoawareness.eu",
      "logo": "https://disinfoawareness.eu/images/logo.png",
      "email": "kontakt@disinfoawareness.eu",
      "description": "Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!",
      "sameAs": []
    }
    </script>
```

**Insgesamt: 34 neue Meta-Tags für besseres SEO! 🚀**

---

## 📱 So sieht es aus

### Google Suche

```
┌─────────────────────────────────────────────────────────┐
│ 🌐 Disinfo Awareness – Gegen Desinformation im...       │
│ https://disinfoawareness.eu                             │
│                                                          │
│ Disinfo Awareness bekämpft Desinformation in ländlichen │
│ Regionen durch Aufklärung, innovative Strategien und    │
│ nachhaltige Bildungsprojekte. Jetzt mehr erfahren!      │
└─────────────────────────────────────────────────────────┘
```

### Facebook / WhatsApp Share

```
┌───────────────────────────────────┐
│  [OG-IMAGE: 1200×630px Bild]      │
│                                   │
│  Disinfo Awareness – Gegen        │
│  Desinformation im ländlichen...  │
│                                   │
│  Disinfo Awareness bekämpft       │
│  Desinformation in ländlichen...  │
│                                   │
│  🔗 disinfoawareness.eu           │
└───────────────────────────────────┘
```

### Browser Tab

```
[🔷 Favicon] Disinfo Awareness – Gegen...
```

---

## 🛠️ Für alle anderen Seiten

Wiederholen Sie den Prozess für jede Seite:

### aufklaerung.html

```php
<?php require_once 'seo-config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php render_complete_seo('aufklaerung.html'); ?>

    <!-- Rest des Head-Bereichs -->
</head>
```

### pim.html

```php
<?php require_once 'seo-config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php render_complete_seo('pim.html'); ?>

    <!-- Rest des Head-Bereichs -->
</head>
```

### innovation.html

```php
<?php require_once 'seo-config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php render_complete_seo('innovation.html'); ?>

    <!-- Rest des Head-Bereichs -->
</head>
```

### kontakt.php (bereits PHP!)

```php
<?php require_once 'seo-config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php render_complete_seo('kontakt.php'); ?>

    <!-- Rest des Head-Bereichs -->
</head>
```

---

## ✅ Fertig!

Nach der Integration können Sie alle SEO-Einstellungen zentral in **`seo-config.php`** anpassen, ohne jede einzelne HTML-Datei bearbeiten zu müssen.

**Nächste Schritte:**
1. Favicon-Dateien erstellen (siehe SEO-ANLEITUNG.md)
2. Open Graph Bilder erstellen (1200×630px)
3. Mit Facebook Debugger testen
4. In Google Search Console einreichen
