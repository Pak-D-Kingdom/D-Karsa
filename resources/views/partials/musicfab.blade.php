<!-- partials/musicfab.blade.php -->
<button id="musicBtn" type="button"
        class="fixed bottom-6 right-6 z-40 inline-flex items-center gap-2.5 pl-1.5 pr-4 py-1.5 rounded-full text-ink text-xs font-bold backdrop-blur-xl shadow-lg border border-brand/25 hover:scale-105 transition"
        style="background: hsla(0, 0%, 100%, 0.88); box-shadow: 0 20px 44px -20px rgba(150, 40, 70, 0.5);"
        title="Putar / Jeda Musik Latar">
    <span class="w-9 h-9 rounded-full bg-cta text-white grid place-items-center shadow-inner" id="musicIcon">♪</span>
    <span id="musicLabel" class="hidden sm:inline">Musik Latar</span>
</button>
<audio id="bgMusic" loop preload="none" src="{{ asset('audio/wedding-melody.wav') }}"></audio>
