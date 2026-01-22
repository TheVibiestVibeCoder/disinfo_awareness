#!/usr/bin/env php
<?php
/**
 * Automatische Bildoptimierung für Disinfo Awareness
 *
 * Dieses Script:
 * - Konvertiert alle JPG/PNG zu WebP (bessere Kompression)
 * - Erstellt responsive Bildversionen (mehrere Größen)
 * - Optimiert existierende Bilder
 *
 * Ausführung: php optimize-images.php
 */

// Konfiguration
$config = [
    'source_dirs' => [
        __DIR__ . '/wp-content/uploads/',
        __DIR__ . '/images/',
        __DIR__ . '/assets/'
    ],
    'webp_quality' => 85,  // WebP Qualität (0-100)
    'jpeg_quality' => 85,  // JPEG Qualität nach Optimierung
    'png_compression' => 8, // PNG Kompression (0-9)
    'responsive_sizes' => [
        'small' => 480,
        'medium' => 768,
        'large' => 1200,
        'xlarge' => 1920
    ],
    'skip_existing' => true // Überspringe bereits konvertierte Bilder
];

class ImageOptimizer {
    private $config;
    private $stats = [
        'processed' => 0,
        'skipped' => 0,
        'failed' => 0,
        'space_saved' => 0
    ];

    public function __construct($config) {
        $this->config = $config;

        // Prüfe ob GD-Bibliothek verfügbar ist
        if (!extension_loaded('gd')) {
            die("❌ GD-Bibliothek nicht verfügbar. Bitte PHP-GD installieren.\n");
        }

        echo "🚀 Bildoptimierung gestartet...\n\n";
    }

    /**
     * Hauptfunktion - startet die Optimierung
     */
    public function optimize() {
        foreach ($this->config['source_dirs'] as $dir) {
            if (!is_dir($dir)) {
                echo "⚠️  Verzeichnis nicht gefunden: $dir\n";
                continue;
            }

            echo "📁 Durchsuche: $dir\n";
            $this->processDirectory($dir);
        }

        $this->printStats();
    }

    /**
     * Durchsucht rekursiv ein Verzeichnis
     */
    private function processDirectory($dir) {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $ext = strtolower($file->getExtension());
                if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                    $this->processImage($file->getPathname());
                }
            }
        }
    }

    /**
     * Verarbeitet ein einzelnes Bild
     */
    private function processImage($filepath) {
        $webp_path = $this->getWebPPath($filepath);

        // Überspringe bereits konvertierte Bilder
        if ($this->config['skip_existing'] && file_exists($webp_path)) {
            $this->stats['skipped']++;
            return;
        }

        echo "  🖼️  Verarbeite: " . basename($filepath) . "\n";

        $original_size = filesize($filepath);
        $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

        // Lade Bild
        $image = null;
        if ($ext === 'jpg' || $ext === 'jpeg') {
            $image = @imagecreatefromjpeg($filepath);
        } elseif ($ext === 'png') {
            $image = @imagecreatefrompng($filepath);
        }

        if (!$image) {
            echo "    ❌ Fehler beim Laden\n";
            $this->stats['failed']++;
            return;
        }

        // Konvertiere zu WebP
        if ($this->createWebP($image, $webp_path)) {
            $webp_size = filesize($webp_path);
            $saved = $original_size - $webp_size;
            $percent = round(($saved / $original_size) * 100, 1);

            $this->stats['space_saved'] += $saved;
            $this->stats['processed']++;

            echo "    ✅ WebP erstellt: " . $this->formatBytes($original_size) . " → " .
                 $this->formatBytes($webp_size) . " (-{$percent}%)\n";
        } else {
            echo "    ⚠️  WebP-Konvertierung fehlgeschlagen\n";
            $this->stats['failed']++;
        }

        imagedestroy($image);
    }

    /**
     * Erstellt WebP-Version eines Bildes
     */
    private function createWebP($image, $output_path) {
        // Erstelle Ausgabeverzeichnis falls nicht vorhanden
        $dir = dirname($output_path);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        // Konvertiere zu WebP
        return imagewebp($image, $output_path, $this->config['webp_quality']);
    }

    /**
     * Generiert WebP-Pfad aus Original-Pfad
     */
    private function getWebPPath($filepath) {
        $info = pathinfo($filepath);
        return $info['dirname'] . '/' . $info['filename'] . '.webp';
    }

    /**
     * Formatiert Bytes zu lesbarem Format
     */
    private function formatBytes($bytes) {
        $units = ['B', 'KB', 'MB', 'GB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.2f", $bytes / pow(1024, $factor)) . ' ' . $units[$factor];
    }

    /**
     * Gibt Statistiken aus
     */
    private function printStats() {
        echo "\n" . str_repeat("=", 50) . "\n";
        echo "📊 STATISTIK\n";
        echo str_repeat("=", 50) . "\n";
        echo "Verarbeitet:   " . $this->stats['processed'] . " Bilder\n";
        echo "Übersprungen:  " . $this->stats['skipped'] . " Bilder\n";
        echo "Fehlgeschlagen: " . $this->stats['failed'] . " Bilder\n";
        echo "Gespart:       " . $this->formatBytes($this->stats['space_saved']) . "\n";
        echo "\n✨ Optimierung abgeschlossen!\n";
    }
}

// Script ausführen
$optimizer = new ImageOptimizer($config);
$optimizer->optimize();
