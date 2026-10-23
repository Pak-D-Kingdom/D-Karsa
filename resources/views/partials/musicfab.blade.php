<!-- partials/musicfab.blade.php -->
<button id="musicBtn" type="button"
        class="fixed bottom-5 left-4 sm:bottom-6 sm:left-6 z-40 inline-flex items-center gap-2.5 pl-1.5 pr-3.5 sm:pr-4 py-1.5 rounded-full text-stone-800 text-xs font-bold backdrop-blur-xl shadow-lg border border-orange-200/80 hover:scale-105 transition duration-300"
        style="background: rgba(255, 255, 255, 0.94); box-shadow: 0 16px 36px -12px rgba(234, 88, 12, 0.35);"
        title="Putar / Jeda Musik Latar">
    <span class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-gradient-to-tr from-amber-500 to-orange-500 text-white grid place-items-center text-sm shadow-inner" id="musicIcon">♪</span>
    <span id="musicLabel" class="hidden sm:inline font-bold text-stone-800">Musik Latar</span>
</button>
<audio id="bgMusic" loop preload="none" src="{{ asset('audio/wedding-melody.wav') }}"></audio>
