<?php

namespace Tests\Feature;

use Tests\TestCase;

class BuilderDraftTemplatePreservationTest extends TestCase
{
    /**
     * Test: Halaman builder memuat mekanisme proteksi penyimpanan draf template
     */
    public function test_builder_view_contains_draft_template_preservation_logic(): void
    {
        $response = $this->get('/buat-undangan');
        $response->assertStatus(200);

        $content = $response->getContent();

        // 1. Kunci proteksi restorasi
        $this->assertStringContainsString('window._isRestoringDraft', $content, 'Harus ada lock _isRestoringDraft untuk mencegah cascading event menimpa template');

        // 2. selectTemplate harus memanggil saveDraftToStorage
        $this->assertStringContainsString('saveDraftToStorage()', $content, 'selectTemplate harus langsung memicu penyimpanan draf');

        // 3. onSelectCategoryChapter & onSubCategoryChange tidak boleh menimpa saat _isRestoringDraft
        $this->assertStringContainsString('!window._isRestoringDraft', $content, 'onSelectCategoryChapter dan onSubCategoryChange harus memeriksa _isRestoringDraft');

        // 4. Banner draf memiliki ringkasan tema & kategori yang tersimpan
        $this->assertStringContainsString('draftSavedSummaryText', $content, 'Banner draf harus memiliki ID draftSavedSummaryText untuk menampilkan tema tersimpan');

        // 5. Restorasi draf mengecualikan structural keys dari cascading event change
        $this->assertStringContainsString('[\'category\', \'sub_category\', \'selected_theme\', \'selected_package\'].includes(key)', $content, 'Field structural harus dikecualikan dari loop change event');

        // 6. Restorasi draf memulihkan tema template di akhir proses
        $this->assertStringContainsString('selectTemplate(themeToRestore, false, false)', $content, 'restoreDraftData harus memulihkan tema template tersimpan secara eksplisit');
    }
}
