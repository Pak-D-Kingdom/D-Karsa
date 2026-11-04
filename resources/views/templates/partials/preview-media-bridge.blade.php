{{--
    Jembatan foto pratinjau.
    Foto yang diunggah di builder (cover, mempelai, galeri) dikirim ke iframe lewat postMessage
    dan disimpan di sessionStorage, sehingga template langsung memakainya tanpa harus order dulu.
--}}
<script>
(function () {
    'use strict';

    var PERSON_IDS = { cover: 'previewCoverPhotoImg', groom: 'previewGroomPhotoImg', bride: 'previewBridePhotoImg' };
    var STORE_KEYS = { cover: 'dkarsa_preview_cover_photo', groom: 'dkarsa_preview_groom_photo', bride: 'dkarsa_preview_bride_photo' };
    var GALLERY_KEY = 'dkarsa_preview_gallery_photos';

    function stored(key) {
        try {
            return localStorage.getItem(key) || sessionStorage.getItem(key) || '';
        } catch (e) {
            return '';
        }
    }

    function paint(el, url) {
        if (!el || !url) { return; }
        if (el.tagName === 'IMG') { el.src = url; }
        else { el.style.backgroundImage = "url('" + url + "')"; }
    }

    function applyPicker(kind, url) {
        if (!url) { return; }
        // Beberapa tema memakai id yang sama di gerbang dan di isi undangan: warnai semuanya.
        document.querySelectorAll('[id="' + PERSON_IDS[kind] + '"]').forEach(function (el) { paint(el, url); });
        document.querySelectorAll('[data-' + kind + '-photo]').forEach(function (el) { paint(el, url); });
        if (kind === 'cover') {
            document.querySelectorAll('.page-photo').forEach(function (el) { paint(el, url); });
        }
    }

    function wireLightbox(img) {
        var host = img.closest('button') || img;
        var fn = window.DKarsaLightbox ? 'DKarsaLightbox' : (window.openLightbox ? 'openLightbox' : '');
        if (!fn) { return; }
        host.setAttribute('onclick', fn + '(this.querySelector("img") ? this.querySelector("img").src : this.src)');
    }

    function applyGallery(list) {
        if (!list || !list.length) { return; }
        var grid = document.getElementById('previewGalleryGrid');
        if (!grid) { return; }
        var imgs = grid.querySelectorAll('img');
        for (var i = 0; i < imgs.length; i++) {
            if (!imgs[i].dataset.dkOriginal) { imgs[i].dataset.dkOriginal = imgs[i].src; }
            imgs[i].src = list[i % list.length];
            wireLightbox(imgs[i]);
        }
    }

    function resetGallery() {
        var grid = document.getElementById('previewGalleryGrid');
        if (!grid) { return; }
        grid.querySelectorAll('img').forEach(function (img) {
            if (img.dataset.dkOriginal) { img.src = img.dataset.dkOriginal; }
        });
    }

    function applyAll(source) {
        source = source || {};
        applyPicker('cover', source.cover !== undefined ? source.cover : stored(STORE_KEYS.cover));
        applyPicker('groom', source.groom !== undefined ? source.groom : stored(STORE_KEYS.groom));
        applyPicker('bride', source.bride !== undefined ? source.bride : stored(STORE_KEYS.bride));

        var gallery = source.gallery;
        if (!gallery) {
            var raw = stored(GALLERY_KEY);
            try { gallery = raw ? JSON.parse(raw) : null; } catch (e) { gallery = null; }
        }
        applyGallery(gallery);
    }

    window.DKarsaApplyPreviewPhotos = applyAll;

    window.addEventListener('message', function (event) {
        var data = event.data || {};
        if (data.type === 'UPDATE_PREVIEW_PHOTOS') { applyAll(data.photos || {}); return; }
        if (data.type === 'UPDATE_PREVIEW_GALLERY') { applyGallery(data.images || data.photos || []); return; }
        if (data.type === 'RESET_PREVIEW_GALLERY') { resetGallery(); return; }
        if (data.type !== 'UPDATE_PREVIEW_PHOTO') { return; }
        var target = data.target;
        if (target !== 'cover' && target !== 'groom' && target !== 'bride') { return; }
        applyPicker(target, data.photoUrl || data.dataUrl || '');
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () { applyAll({}); });
    } else {
        applyAll({});
    }
})();
</script>
