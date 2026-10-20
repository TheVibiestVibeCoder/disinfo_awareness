# Design-Baseline disinfoawareness.eu

**Stand:** 20.10.2026 · Branch `Valentin_Redesign`
**Grundlage:** [`design.md`](design.md) (Vorlage „Voices United“) und das Relaunch-Briefing (Gemeinde-Aufklärung als Hauptprojekt, CEU-Veranstaltung)

Dieses Dokument hält fest, **wie** die Seite gestaltet ist und **warum**. Es ist die Referenz für alle künftigen Änderungen:
Wer etwas Neues baut, nimmt die Bausteine von hier, statt neue zu erfinden.

---

## 1. Leitidee

Nach dem Besuch müssen Menschen zwei Dinge wissen:

1. **Was wir tun:** Wir gehen in die Gemeinden und machen Menschen resilient gegen Desinformation (plus Schulen, NGO-Analyse, Diaspora).
2. **Wie man uns unterstützt:** spenden, eine Gemeinde oder einen Workshop anfragen, zur Veranstaltung kommen.

Jede Seite ist auf diese beiden Fragen hin gebaut. Alles, was dabei nicht hilft, ist weggelassen.

## 2. Prinzipien

| Prinzip | Was es konkret heißt |
|---|---|
| **Weniger ist mehr** | Eine Akzentfarbe, zwei Schriften, wenige Bausteine, die sich wiederholen. Keine Effekte ohne Funktion. |
| **Orange heißt Spenden** | Eine gefüllte orange Fläche gibt es nur für den Spenden-Button. Deshalb springt er überall sofort ins Auge, im Aufmacher genauso wie in der Navigation. |
| **Echte Inhalte** | Texte wörtlich aus dem Bestand bzw. Briefing. Keine erfundenen Zahlen, Zitate oder KI-Bilder. Stockfotos sind als solche gekennzeichnet. |
| **Mobil zuerst** | Alles ist für 320 px Breite gebaut und wächst von dort. Schriftgrößen und Abstände skalieren stufenlos (`clamp()`). |
| **Bewegung mit Sinn** | Nur dort, wo sie etwas erklärt (Kapsel-Galerie, Slide-Stapel). Bei „Bewegung reduzieren“ im System ist alles statisch. |
| **Nichts von Dritten** | Schriften, Bilder und Skripte liegen auf unserem Server. Kein Google, kein CDN, keine Tracker. |

## 3. Farben

Alle Werte stehen zentral in [`assets/css/tokens.css`](../assets/css/tokens.css).

| Token | Wert | Einsatz | Kontrast |
|---|---|---|---|
| `--cream` | `#F1F2EB` | Seitenhintergrund | – |
| `--white` | `#FFFFFF` | Karten (Projekte, Slides, Formular, Spendenkarte) | – |
| `--mist` | `#F6F6F3` | Eingabefelder, Bankdaten-Felder | – |
| `--ink` | `#242424` | Text, dunkle Buttons, dunkle Flächen (Veranstaltung) | 13,8 : 1 auf Creme |
| `--ink-muted` | `#5F5F5A` | Sekundärtext, Labels | 5,7 : 1 auf Creme |
| `--orange` | `#FF6941` | **Spenden-Button**; Akzentwort auf dunklen Flächen | Tinte darauf 5,4 : 1 |
| `--orange-text` | `#C2410C` | Akzentwort auf hellen Flächen, Kapitel-Labels | 4,6 : 1 auf Creme |

Alle Kombinationen erfüllen WCAG AA. Deshalb hat der orange Button **dunkle** Schrift (weiße Schrift hätte nur 2,9 : 1),
und orange **Text** auf Hellem nutzt den dunkleren Ton `--orange-text`.

**Akzentwort:** In Überschriften ist genau ein Wort orange („Weitere **Projekte**“, „Das **Team**“). Gesetzt wird es mit `accent('Das Team', 'Team')`.

## 4. Typografie

| Rolle | Schrift | Regeln |
|---|---|---|
| Überschriften | **Anton** (selbst gehostet) | Versalien, sehr groß, Zeilenabstand 1,04. Anton ist kräftiger als das bisherige Bebas Neue. Das braucht der Bild-im-Text-Titel, damit die Fotos in den Buchstaben sichtbar werden. |
| Fließtext | **Manrope** (selbst gehostet) | 17 px, Zeilenabstand 1,65, Zeilenlänge max. ~62 Zeichen |
| Labels, Buttons, Navigation | Manrope fett | 13 px, Versalien, Laufweite 0,09 em |

Skala (stufenlos zwischen Handy und Desktop): Seitentitel 52–136 px · Abschnittstitel 40–84 px · Slides/CTA 32–56 px · Kartentitel 26–36 px · Lead 18–21 px.

**Umlaute:** In Anton reichen Ä/Ö/Ü bis 1,06 em über die Grundlinie. Deshalb sind Zeilenabstände nie kleiner als 1,04, sonst stoßen die Punkte an die Zeile darüber.

## 5. Raster, Abstände, Formen

- **Container:** max. 1320 px Inhalt, seitlicher Rand 16 px (Handy) bis 40 px (Desktop)
- **Abschnittsabstand:** 72–136 px, stufenlos
- **Breakpoints:** 600 px (Formularzeilen zweispaltig) · 900 px (Handy → Desktop-Layout, Navigation) · 1200 px (Kapitel-Leiste einzeilig, Team als Kapseln)
- **Radien:** Karten 22–32 px · Felder 12 px · Buttons und Chips komplett rund (Pill)
- **Keine Schatten** auf Karten (wie in der Vorlage). Ausnahmen: das Dropdown-Menü und die gestapelten Slides, damit man die Kanten übereinanderliegender weißer Karten sieht.

## 6. Bausteine

### Buttons: eine klare Hierarchie

| Klasse | Aussehen | Wofür |
|---|---|---|
| `.btn--donate` | Orange gefüllt | **Nur Spenden** (Navigation, Aufmacher, Spendenaufrufe, Menü) |
| `.btn--primary` | Tinte gefüllt | Die Hauptaktion eines Abschnitts: „Gemeinde anfragen“, „Nachricht senden“ … |
| `.btn--outline` | Tinten-Kontur | Zweite Aktion daneben („Projekt ansehen“) |
| `.btn--light` | Creme gefüllt | Hauptaktion auf dunklen Flächen („Interesse melden“) |

Runde Icon-Buttons (↗) markieren klickbare Teaser. Kopieren-Buttons und Auswahl-Chips sind kleine Pills.

### Weitere Bausteine

- **Label:** kleine Versalien über jeder Überschrift („Unser Hauptprojekt“, „Unsere Arbeit“)
- **Projektkarte:** weiß, Foto oben, Titel, Text, „Mehr erfahren ↗“. Die ganze Karte ist klickbar.
- **Kapitel-Leiste** (Startseite): die fünf Slides des Hauptprojekts als Zeile aus rundem Foto, Label und Titel. Das ist die News-Leiste der Vorlage. Mobil wischbar, ab 1200 px alle fünf in einer Reihe.
- **Slide-Stapel** (Gemeinde-Seite): eine weiße Karte pro Slide. Beim Scrollen bleibt jede Karte stehen, die nächste schiebt sich darüber, die Kanten der vorigen bleiben sichtbar. Das ist der Stapel-Effekt der Vorlage.
- **Team-Kapseln** (Startseite, ab 1200 px): schmale, runde Porträts; das aktive klappt breit auf und zeigt Name, Rolle, Kurzbio, LinkedIn. Öffnet bei Hover, Tastaturfokus und Antippen. Darunter: wischbare Karten mit Foto oben und Text darunter, damit nichts ein Gesicht verdeckt.
- **Spendenaufruf:** dunkles, stark weichgezeichnetes Foto, weiße Headline mit orangem Akzentwort, Spenden-Button
- **Spendenkarte:** weiße Karte auf weichgezeichnetem Foto; Bankdaten mit Kopieren-Buttons und QR-Code
- **Formular:** Felder in `--mist`, Betreff als Auswahl-Chips (gewählter Chip in Tinte)
- **Bildnachweis:** kleine dunkle Pill unten rechts auf dem Foto („Foto: Name / Unsplash“)

## 7. Seiten

**Header (alle Seiten):** Schriftzug links, Navigation in der Mitte (Projekte ▾ · Veranstaltung · Team · Kontakt), oranger „Spenden“-Button rechts.
Bleibt beim Scrollen sichtbar, sodass Spenden immer einen Klick entfernt ist. Mobil: Schriftzug, „Spenden“, runder Menü-Button. Das Menü ist ein Vollbild-Dialog mit allen Projekten und großem Spenden-Button.

**Startseite (von oben nach unten):**
1. **Aufmacher:** „Unser Hauptprojekt“, riesiger Titel GEMEINDE-AUFKLÄRUNG mit Fotos *in* den Buchstaben, Kurzbeschreibung, **[Jetzt spenden]** (orange) + [Projekt ansehen]. Titel und Button führen zur Projektbeschreibung.
2. **Kapitel-Leiste:** die fünf Slides als Einstieg, jeder Punkt springt direkt zur passenden Slide
3. **Weitere Projekte:** NGO-Business, Schulprojekte, Diaspora-Aufklärung als kleinere Karten
4. **Veranstaltung:** dunkle Karte, Datum groß, Text, [Interesse melden] → Kontaktformular mit vorausgewähltem Betreff
5. **Das Team:** Kapsel-Galerie
6. **Spendenaufruf** („Demokratie braucht Rückhalt.“)
7. **Footer** mit unserem Claim „Gemeinsam gegen Desinformation“ und allen Links

**Gemeinde-Aufklärung:** Seitentitel und Lead, die fünf Slides als Stapel (Texte wörtlich aus dem Briefing), dann „Mitmachen“ mit **[Gemeinde anfragen]** → Kontaktformular, dann Spendenaufruf.

**NGO-Business, Schulprojekte, Diaspora-Aufklärung:** Seitentitel und Lead, zwei Abschnitte mit Text und Foto im Wechsel (die Bildtitel stehen auf dem Foto), Anfrage-Button, Spendenaufruf.

**Spenden:** weichgezeichnete Bühne, „Jetzt Spenden“, Spendenkarte. Auf dem Desktop stehen Bankdaten und QR-Code nebeneinander, mobil zuerst die Bankdaten. Darunter „Warum Ihre Spende zählt“.

**Kontakt:** links Einleitung und Kontaktdaten, rechts das Formular in einer weißen Karte (mobil: Einleitung, Formular, Kontaktdaten).

**Impressum, Datenschutz:** ruhige Textseiten mit Trennlinien, keine Effekte. Text unverändert.

## 8. Entscheidungen und warum

Wo die Umsetzung von Vorlage oder Briefing abweicht, steht hier der Grund.

| Entscheidung | Warum |
|---|---|
| **Orange nur für Spenden** statt für alle Hauptbuttons (Vorlage, design.md) | Wunsch: Der Spenden-Button muss sich farblich abheben. Wäre jeder wichtige Button orange, ginge er unter. |
| **Gemeinde-Slides auf der Projektseite**, auf der Startseite als Kapitel-Leiste | Briefing: „Ein Klick öffnet die Projektbeschreibung“. Eine eigene Seite ist teilbar, findbar und funktioniert mit dem Zurück-Button. Die Leiste erzählt die Geschichte trotzdem schon auf der Startseite in fünf Überschriften. |
| **Slides als Stapel statt Karussell** | Bei Karussells sieht kaum jemand mehr als die erste Folie. Beim Scrollen sieht man alle fünf, ganz ohne Pfeile. |
| **Kein Umschalter „Überweisung \| QR-Code“** (design.md) | Er spart keinen Platz, kostet aber einen Klick. Auf dem Desktop passt beides nebeneinander. Mobil kann man den eigenen Bildschirm nicht scannen, also kommen dort die Bankdaten zuerst. |
| **Keine Kennzahlen-Kacheln und Zitat-Karten** | Es gibt noch keine belegten Zahlen und freigegebenen Zitate. Leere oder erfundene Werte widersprechen unserem Auftrag. |
| **Kein Vollbild mit wechselnden Themenwörtern** | Reine Dekoration, beantwortet keine der beiden Leitfragen |
| **Partikel-Animation (three.js) entfernt** | ~250 KB Skript von einem fremden Server auf jeder Seite, hoher Akkuverbrauch, passt nicht zur hellen Bildsprache. Der Bild-im-Text-Titel ersetzt sie. |
| **Anton statt Bebas Neue** | Kräftigere Strichstärke, näher an der Vorlage. Nur so funktionieren Fotos in den Buchstaben. |
| **Hängender Bindestrich** im Aufmacher | „GEMEINDE-“ wirkt sonst nach links versetzt. Der Strich ragt optisch aus der Achse. |
| **Diaspora als dritte kleine Karte** | Im Briefing nicht erwähnt. Nach Rückfrage bleibt sie sichtbar. |
| **Team-Karten mobil mit Text unter dem Foto** | Ein Text-Overlay hätte auf Handybreite die Gesichter verdeckt |
| **Betreff wird vorausgewählt** (`/kontakt.php?betreff=…`) | Wer „Gemeinde anfragen“ oder „Interesse melden“ klickt, muss nicht noch einmal auswählen, worum es geht. Für die Veranstaltung gibt es einen eigenen Betreff, damit Anmeldungen sofort erkennbar sind. |
| **Veranstaltung verschwindet nach dem 27.11. automatisch** | Niemand muss daran denken, sie zu entfernen. Veraltete Ankündigungen wirken unseriös. |
| **Eingaben bleiben bei Fehlern erhalten** | Vorher war die Nachricht nach einem Fehler weg |
| **Auswahl-Chips in Tinte statt Hellorange** (design.md) | Hält Orange für Spenden frei |
| **Claim „Gemeinsam gegen Desinformation“ im Footer** | Der bisherige Aufmacher-Claim bleibt so auf jeder Seite erhalten |

## 9. Barrierefreiheit

- Kontraste nach WCAG AA (siehe Farben); Labels, Platzhalter und Sekundärtext eingeschlossen
- Sichtbarer Tastaturfokus überall (auf dunklen Flächen in Creme)
- „Zum Inhalt springen“-Link ist zurück
- Der Bild-im-Text-Titel ist echter Text (für Screenreader und Google). Browser ohne die Technik zeigen ihn einfach dunkel.
- Mobiles Menü als natives `<dialog>`: Fokus bleibt im Menü, Escape schließt
- Projekte-Dropdown per Tastatur bedienbar (Enter öffnet, Escape schließt)
- „Bewegung reduzieren“ schaltet Einblendungen, Übergänge und weiches Scrollen ab
- Ohne JavaScript ist aller Inhalt sichtbar und alle Seiten sind über den Footer erreichbar
- Alle inhaltlichen Fotos haben einen Alternativtext. Rein dekorative Bilder sind für Screenreader ausgeblendet: Kapitel-Thumbnails, Hintergründe und Teamfotos, deren Name direkt daneben steht.

## 10. Performance und Datenschutz

- Schriften selbst gehostet: Anton 19 KB, Manrope 25 KB (WOFF2, vorgeladen)
- Alle Fotos lokal als WebP in zwei Breiten (`srcset`): Der Browser lädt nur, was der Bildschirm braucht
- Fotos unterhalb des ersten Bildschirms werden erst beim Scrollen geladen
- Kein three.js, kein Google Fonts, keine Bilder von Unsplash oder disinfoconsulting.eu mehr. Damit gehen beim Seitenaufruf **keine IP-Adressen an Dritte**.
- Die Content-Security-Policy in `.htaccess` erlaubt entsprechend nur noch die eigene Domain

## 11. Fotos

### Herkunft

| Wo | Foto | Quelle |
|---|---|---|
| Slide 1 „Die Lücke“ | Feld mit Hof bei Schwechat | Michael Pointner / [Unsplash](https://unsplash.com/photos/green-field-under-a-vibrant-sunset-sky-with-distant-hills-Xh2hWK7ythY), **Ersatz**, siehe unten |
| Slide 2 „Vor Ort“ | Rustikale Gaststube mit Holzmöbeln | Tim Raderschad / [Unsplash](https://unsplash.com/photos/6n-viDi8X0I) |
| Slide 3 „Multiplikator:innen“ | Ältere Frau im Gespräch am Tisch | Age Cymru / [Unsplash](https://unsplash.com/photos/a-woman-sitting-at-a-table-talking-to-another-woman-wLXJ1Q-_S88) |
| Slide 4 „Methode“ | Diskussion am großen Tisch | Redd Francisco / [Unsplash](https://unsplash.com/photos/talking-people-sitting-beside-table-PTRzqc_h1r4) |
| Slide 5 „Wirkung“ | Unser FIMI-Vortrag | eigenes Foto (`design/Bilder/vortrag-fimi.jpeg`) |
| Aufmacher (in den Buchstaben) | Fotos von Slide 1 und 2 | wie oben |
| Spenden-Hintergründe | Gruppenfoto, stark weichgezeichnet | eigenes Foto (`design/Bilder/gruppenfoto-buero.jpeg`) |
| Projektseiten, Projektkarten | die bisherigen Unsplash-Fotos | unverändert übernommen, jetzt lokal |
| Team | die bisherigen Porträts | jetzt lokal, auf Hochformat zugeschnitten |
| QR-Code | Bank-QR | unverändert, jetzt lokal (`assets/img/bank-qr.jpg`) |

**Slide 1:** Das im Briefing genannte Foto „Leere Dorfstraße mit Kopfsteinpflaster“ von Michael Pointner war unter seinen über 400 Unsplash-Fotos nicht auffindbar.
Deshalb steht dort ein ländliches Motiv desselben Fotografen. Alle Slides 1–4 sind ohnehin Platzhalter, bis Fotos aus eigenen Veranstaltungen ausgewählt sind.

### Fotos austauschen

1. Foto als **WebP** in etwa **800 px und 1600 px Breite** exportieren (z. B. mit [Squoosh](https://squoosh.app), Qualität ~75).
   Thumbnails der Kapitel-Leiste: **192 × 192 px**. Teamfotos: **Hochformat 4 : 5**, Gesicht mittig.
2. Die Dateien nach ihrer **tatsächlichen Breite** benennen, z. B. `assets/img/gemeinde/slide-1-800.webp` und `slide-1-1600.webp`, und die alten ersetzen.
3. In der Datendatei (`app/data/projects.php` bzw. `team.php`) `alt` (Bildbeschreibung) anpassen und bei eigenen Fotos `'credit' => null` setzen.

Die Seite findet alle Breiten automatisch und erzeugt daraus `srcset`.

## 12. Offene Punkte

- [ ] **LinkedIn-URL bestätigen:** `app/config.php` → `social.linkedin` (derzeit `linkedin.com/company/disinfo-awareness`)
- [ ] **Eigene Fotos für die Slides 1–4** (aus Gemeinde-Veranstaltungen)
- [ ] **Neue Fotos vom EP-Workshop** für Schulprojekte (werden nachgeliefert)
- [ ] **Bild für die Veranstaltung:** Die Karte funktioniert bewusst ohne Foto (Datum als Bildelement). Ein Foto ist nicht nötig.
- [ ] **Ort der Veranstaltung** ergänzen, sobald fix (`app/data/event.php`)
- [ ] **Bildmarke / Logo:** Bisher nur der Schriftzug. Die Favicons stammen aus dem alten, dunklen Design.
- [ ] **Datenschutzerklärung aktualisieren:** Sie wird durch den Wegfall der Drittanbieter einfacher, ist aber weiterhin veraltet (siehe `docs/Projektstand.md`)
- [ ] Kleinigkeiten im Inhalt (bewusst nicht angefasst): „Obmann **Stelv.**“ bei Robert (wohl „Stellv.“); gemischte Anrede du/Sie (Kontakt, Spenden, Schulprojekte); das Matrix-Code-Foto bei NGO-Business passt nicht zur warmen Bildsprache

## 13. Getestet

Lokal mit PHP 8.1 (wie auf dem Server) und Chrome, in 15 Größen:
320 × 568 · 360 × 780 · 375 × 667 · 390 × 844 · 430 × 932 · 844 × 390 (Handy quer) · 768 × 1024 · 1024 × 768 · 1200 × 800 · 1280 × 720 · 1366 × 640 · 1440 × 900 · 1536 × 730 · 1920 × 1080 · 2560 × 1440.

- **Automatisch, alle 10 Seiten in allen 15 Größen:** kein horizontales Scrollen, kein Element ragt aus dem Bildschirm (150 von 150 bestanden)
- **Per Screenshot:** der Aufmacher in allen Größen; alle Seiten auf Handy, Tablet und Desktop
- **Funktionen:** Formular (Fehlerfall, Eingaben bleiben erhalten, CSRF, Betreff-Vorauswahl), automatisches Ausblenden der Veranstaltung, Sprungmarken in die Slides, Slide-Stapel beim Scrollen, Team-Kapseln, mobiles Menü und Dropdown
