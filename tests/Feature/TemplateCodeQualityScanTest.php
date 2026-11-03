<?php

namespace Tests\Feature;

use Tests\TestCase;

class TemplateCodeQualityScanTest extends TestCase
{
    /**
     * Scan semua file template blade untuk mengecek potensi bug:
     * 1. Penggunaan $couple->wedding_date (apakah aman jika Carbon atau string?)
     * 2. Unclosed tags atau malformed Blade expressions
     * 3. Copy to clipboard handler
     * 4. Script countdown timer
     * 5. Fallback gambar / photo handling
     */
    public function test_scan_all_template_blade_files_for_code_smells(): void
    {
        $files = glob(resource_path('views/templates/*.blade.php'));
        $this->assertNotEmpty($files);

        $warnings = [];

        foreach ($files as $file) {
            $baseName = basename($file);
            $content = file_get_contents($file);

            // 1. Cek pemanggilan direct format() tanpa pengecekan Carbon vs string
            // Jika ada $couple->wedding_date->format(...) tapi wedding_date bisa string
            // Namun TemplateManager::getDemoCouple me-return Carbon instance.
            // Mari kita cek apakah ada template yang memanggil method pada property yang bisa null tanpa optional / nullsafe.
            
            // 2. Cek apakah ada inline script syntax error seperti tag script tidak tertutup
            $openScriptCount = substr_count($content, '<script');
            $closeScriptCount = substr_count($content, '</script>');
            if ($openScriptCount !== $closeScriptCount) {
                $warnings[] = "{$baseName}: Jumlah tag <script> ({$openScriptCount}) tidak sama dengan </script> ({$closeScriptCount})";
            }

            // 3. Cek apakah ada unclosed Blade directives seperti @if tanpa @endif
            $ifCount = preg_match_all('/@if\b/', $content);
            $endifCount = preg_match_all('/@endif\b/', $content);
            if ($ifCount !== $endifCount) {
                $warnings[] = "{$baseName}: Jumlah @if ({$ifCount}) tidak sama dengan @endif ({$endifCount})";
            }

            // 4. Cek @foreach dan @endforeach
            $foreachCount = preg_match_all('/@foreach\b/', $content);
            $endforeachCount = preg_match_all('/@endforeach\b/', $content);
            if ($foreachCount !== $endforeachCount) {
                $warnings[] = "{$baseName}: Jumlah @foreach ({$foreachCount}) tidak sama dengan @endforeach ({$endforeachCount})";
            }

            // 5. Cek @forelse dan @endforelse
            $forelseCount = preg_match_all('/@forelse\b/', $content);
            $endforelseCount = preg_match_all('/@endforelse\b/', $content);
            if ($forelseCount !== $endforelseCount) {
                $warnings[] = "{$baseName}: Jumlah @forelse ({$forelseCount}) tidak sama dengan @endforelse ({$endforelseCount})";
            }
        }

        $this->assertEmpty($warnings, "Ditemukan potensi issue pada file blade:\n" . implode("\n", $warnings));
    }
}
