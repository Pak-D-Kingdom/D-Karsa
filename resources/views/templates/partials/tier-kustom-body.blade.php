{{--
    Paket KUSTOM (Rp280.000) — Bespoke Royal Concierge Studio.
    Semua fitur Eksklusif + Bespoke Customizer Dock (hex warna, mekanisme gerbang, ID/EN),
    Cinema Video Highlight, Table Lookup, dan QRIS + Gift Wishlist.
--}}
@include('templates.partials.tier-eksklusif-body', ['bespoke' => true])

{{-- Bespoke Customizer Dock (mengambang di atas HUD) --}}
<div id="bespoke-dock" aria-label="Kustomisasi undangan">
    <div id="bespoke-panel" hidden>
        <div class="bespoke-row">
            <span class="hud">LATAR (cBg)</span>
            <input type="color" id="bespokeBg" name="cBg" value="{{ $colorTheme['page'] ?? '#F3F8FC' }}" aria-label="Latar Belakang">
        </div>
        <div class="bespoke-row">
            <span class="hud">KARTU (cCard)</span>
            <input type="color" id="bespokeCard" name="cCard" value="{{ $colorTheme['card'] ?? '#FFFFFF' }}" aria-label="Permukaan Kartu">
        </div>
        <div class="bespoke-row">
            <span class="hud">AKSEN (cAcc)</span>
            <input type="color" id="bespokeColor" name="cAcc" value="{{ $colorTheme['accent'] ?? ($c['accent'] ?? '#1D6FA5') }}" aria-label="Warna Aksen">
        </div>
        <div class="bespoke-row">
            <span class="hud">TEKS (cTxt)</span>
            <input type="color" id="bespokeTxt" name="cTxt" value="{{ $colorTheme['text'] ?? '#102A43' }}" aria-label="Teks Utama">
        </div>
        <div class="bespoke-row">
            <span class="hud">GERBANG</span>
            <div class="bespoke-seg">
                <button type="button" data-gate="v-angle" class="is-on" onclick="DKarsaGateStyle('v-angle')">V-ANGLE</button>
                <button type="button" data-gate="envelope" onclick="DKarsaGateStyle('envelope')">AMPLOP</button>
                <button type="button" data-gate="arch" onclick="DKarsaGateStyle('arch')">ARCH</button>
            </div>
        </div>
        <div class="bespoke-row">
            <span class="hud">3D DEPTH</span>
            <div class="bespoke-seg">
                <button type="button" data-depth="1" class="is-on" onclick="DKarsaParallaxEngine.setDepth(1)">NORMAL</button>
                <button type="button" data-depth="1.5" onclick="DKarsaParallaxEngine.setDepth(1.5)">HIGH</button>
                <button type="button" data-depth="2" onclick="DKarsaParallaxEngine.setDepth(2)">CINEMA</button>
            </div>
        </div>
        <div class="bespoke-row">
            <span class="hud">BAHASA</span>
            <div class="bespoke-seg">
                <button type="button" data-lang="id" class="is-on" onclick="DKarsaLang('id')">ID</button>
                <button type="button" data-lang="en" onclick="DKarsaLang('en')">EN</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal video --}}
<div id="video-modal" hidden>
    <div class="video-modal-card">
        <div class="video-frame">
            <iframe id="videoFrame" title="Video highlight" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <button type="button" class="btn-gold w-full mt-3" onclick="DKarsaCloseVideo()">TUTUP</button>
    </div>
</div>
