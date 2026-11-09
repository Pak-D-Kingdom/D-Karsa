{{-- Universal Live Preview & Fullscreen Mode Synchronizer --}}
<script>
    (function() {
        function safeGetItem(key) {
            try {
                if (typeof window !== 'undefined' && window.localStorage) {
                    const val = window.localStorage.getItem(key);
                    if (val !== null && val !== undefined) return val;
                }
            } catch(e) {}
            try {
                if (typeof window !== 'undefined' && window.sessionStorage) {
                    return window.sessionStorage.getItem(key);
                }
            } catch(e) {}
            return null;
        }

        function getStoredData(key) {
            try {
                const item = safeGetItem(key);
                return item ? JSON.parse(item) : null;
            } catch(e) {
                return null;
            }
        }

        // Provide universal default renderDynamicEvents if template did not provide one
        if (typeof window.renderDynamicEvents !== 'function') {
            window.renderDynamicEvents = function(events) {
                const container = document.getElementById('itineraryContainer');
                if (!container || !Array.isArray(events) || events.length === 0) return;

                container.innerHTML = events.map((ev, i) => {
                    const title = ev.title || `Acara ${i + 1}`;
                    const timeStr = [ev.start_time, ev.end_time].filter(Boolean).join(" - ") || "09:00 - Selesai";
                    const venue = ev.venue_name || "";
                    const addr = ev.address || "";
                    const dateStr = ev.date ? `📅 ${ev.date}` : "";
                    const mapsBtn = ev.maps_url ? `<a href="${ev.maps_url}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:underline mt-2"><span>📍</span><span>Petunjuk Arah Google Maps</span> &rarr;</a>` : "";

                    return `
                        <div class="p-4 sm:p-5 rounded-2xl bg-white/95 dark:bg-neutral-800/95 border border-neutral-200/70 dark:border-neutral-700/70 shadow-sm flex flex-col gap-1.5 text-left event-itinerary-item">
                            <div class="flex items-center justify-between">
                                <span class="text-xs uppercase tracking-wider font-bold text-amber-600 dark:text-amber-400">SESI ${i + 1}</span>
                                <span class="text-xs font-semibold text-neutral-600 dark:text-neutral-300">${timeStr}</span>
                            </div>
                            <h4 class="text-base font-bold text-neutral-900 dark:text-neutral-100 leading-snug">${title}</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400">${venue}${addr ? " &bull; " + addr : ""}</p>
                            ${dateStr ? `<span class="text-[11px] text-neutral-500 dark:text-neutral-400 block mt-0.5">${dateStr}</span>` : ""}
                            ${mapsBtn}
                        </div>
                    `;
                }).join('');
            };
        }

        // Universal Event & Wedding Date Synchronization Engine
        function applyUniversalWeddingDate(dateStr) {
            if (!dateStr) return;
            try {
                let cleanStr = String(dateStr).trim();
                let targetDt = null;

                if (cleanStr.includes('/')) {
                    const slashParts = cleanStr.split('/');
                    if (slashParts.length === 3) {
                        if (slashParts[0].length === 4) {
                            targetDt = new Date(parseInt(slashParts[0], 10), parseInt(slashParts[1], 10) - 1, parseInt(slashParts[2], 10), 9, 0, 0);
                        } else {
                            targetDt = new Date(parseInt(slashParts[2], 10), parseInt(slashParts[1], 10) - 1, parseInt(slashParts[0], 10), 9, 0, 0);
                        }
                    }
                } else {
                    const parts = cleanStr.split('T')[0].split(' ')[0].split('-');
                    if (parts.length === 3 && parts[0].length === 4) {
                        targetDt = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10), 9, 0, 0);
                    } else {
                        targetDt = new Date(cleanStr);
                    }
                }

                if (!targetDt || isNaN(targetDt.getTime())) return;

                window.targetWeddingDate = targetDt;
                window.targetDate = targetDt;
                window.countdownTarget = targetDt;

                // 1. Panggil hook spesifik template jika tersedia
                if (typeof window.updateTargetDate === 'function') {
                    try { window.updateTargetDate(cleanStr); } catch(e) {}
                }

                // 2. Format tanggal bahasa Indonesia resmi
                const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                const dNum = targetDt.getDate();
                const mIdx = targetDt.getMonth();
                const yNum = targetDt.getFullYear();
                const dayName = dayNames[targetDt.getDay()];
                const monthName = monthNames[mIdx];
                const fullIndoDate = `${dayName}, ${dNum} ${monthName} ${yNum}`;
                const shortIndoDate = `${dNum} ${monthName} ${yNum}`;
                const monthYearUpper = `${monthName.toUpperCase()} ${yNum}`;
                const fullIndoDateUpper = fullIndoDate.toUpperCase();
                const shortIndoDateUpper = shortIndoDate.toUpperCase();

                // 3. Sinkronkan Header Bulan Kalender & Grid Kalender
                const mHeader = document.getElementById('calendarMonthHeader');
                if (mHeader) {
                    mHeader.textContent = monthYearUpper;
                }
                if (typeof window.buildCalendar === 'function') {
                    try { window.buildCalendar(); } catch(e) {}
                } else {
                    const gridBody = document.getElementById('calendarGridBody');
                    if (gridBody) {
                        const firstDayIndex = new Date(yNum, mIdx, 1).getDay();
                        const totalDaysInMonth = new Date(yNum, mIdx + 1, 0).getDate();
                        gridBody.innerHTML = '';
                        let currentDay = 1;
                        let finished = false;
                        for (let row = 0; row < 6; row++) {
                            if (finished) break;
                            const tr = document.createElement('tr');
                            for (let col = 0; col < 7; col++) {
                                const td = document.createElement('td');
                                if (row === 0 && col < firstDayIndex) {
                                    td.innerHTML = '<span class="text-neutral-300"></span>';
                                } else if (currentDay > totalDaysInMonth) {
                                    td.innerHTML = '<span class="text-neutral-300"></span>';
                                    finished = true;
                                } else {
                                    if (currentDay === dNum) {
                                        td.innerHTML = `<span class="calendar-day-active">${currentDay}</span>`;
                                    } else {
                                        td.innerHTML = `<span class="text-neutral-700">${currentDay}</span>`;
                                    }
                                    currentDay++;
                                }
                                tr.appendChild(td);
                            }
                            gridBody.appendChild(tr);
                        }
                    }
                }

                // 4. Sinkronkan seluruh teks display tanggal di semua template dengan selector
                const dateTargets = [
                    document.getElementById('previewWeddingDateFormatted'),
                    document.getElementById('previewWeddingDate'),
                    document.getElementById('previewEventDate'),
                    document.getElementById('previewCoverDate'),
                    document.getElementById('previewHeroDate'),
                    document.getElementById('previewSaveTheDate'),
                    document.getElementById('weddingDateDisplay'),
                    document.getElementById('eventDateDisplay'),
                    document.getElementById('eventDateBadge'),
                    document.getElementById('previewEventDateBadge')
                ];
                dateTargets.forEach(el => {
                    if (el) {
                        const isUpper = el.textContent && el.textContent === el.textContent.toUpperCase() && el.textContent.trim().length > 3;
                        const formattedText = isUpper ? fullIndoDateUpper : fullIndoDate;
                        el.textContent = el.textContent && el.textContent.includes('📅') ? `📅 ${formattedText}` : formattedText;
                    }
                });

                document.querySelectorAll('.preview-wedding-date-text, .wedding-date-text, .event-date-formatted, .preview-cover-date, .preview-hero-date').forEach(el => {
                    const isUpper = el.textContent && el.textContent === el.textContent.toUpperCase() && el.textContent.trim().length > 3;
                    const formattedText = isUpper ? fullIndoDateUpper : fullIndoDate;
                    el.textContent = el.textContent && el.textContent.includes('📅') ? `📅 ${formattedText}` : formattedText;
                });

                // 4b. Smart text replacer across leaf DOM elements containing Indonesian date patterns
                const indoDateRegex = /((?:Minggu|Senin|Selasa|Rabu|Kamis|Jumat|Sabtu),\s*)?\d{1,2}\s+(?:Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember)\s+\d{4}/gi;
                document.querySelectorAll('p, span, h1, h2, h3, h4, h5, h6, b, strong, div').forEach(el => {
                    if (el.children.length === 0 && el.textContent) {
                        const txt = el.textContent.trim();
                        if (indoDateRegex.test(txt)) {
                            el.textContent = txt.replace(indoDateRegex, (match, prefix) => {
                                const isAllUpper = match === match.toUpperCase();
                                if (prefix) {
                                    return isAllUpper ? fullIndoDateUpper : fullIndoDate;
                                } else {
                                    return isAllUpper ? shortIndoDateUpper : shortIndoDate;
                                }
                            });
                        }
                    }
                });

                // 5. Update Universal Countdown Timers di seluruh template
                function refreshUniversalCountdown() {
                    const now = Date.now();
                    const diff = targetDt.getTime() - now;

                    let d = '00', h = '00', m = '00', s = '00';
                    if (diff > 0) {
                        d = String(Math.floor(diff / (1000 * 60 * 60 * 24))).padStart(2, '0');
                        h = String(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                        m = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                        s = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');
                    }

                    const dayEls = document.querySelectorAll('#countDays, #count-days, #cd-days, #cdDays, #hud-days, #hudDays, #timerDays, #timer-days, #days, .cd-days, .countdown-days, [data-countdown="days"]');
                    dayEls.forEach(el => { el.textContent = d; });
                    const hrEls = document.querySelectorAll('#countHours, #count-hours, #cd-hours, #cdHours, #hud-hours, #hudHours, #timerHours, #timer-hours, #hours, .cd-hours, .countdown-hours, [data-countdown="hours"]');
                    hrEls.forEach(el => { el.textContent = h; });
                    const minEls = document.querySelectorAll('#countMinutes, #count-minutes, #cd-minutes, #cdMinutes, #hud-minutes, #hud-mins, #hudMins, #timerMinutes, #timer-minutes, #minutes, .cd-minutes, .countdown-minutes, [data-countdown="minutes"]');
                    minEls.forEach(el => { el.textContent = m; });
                    const secEls = document.querySelectorAll('#countSeconds, #count-seconds, #cd-seconds, #cdSeconds, #hud-seconds, #hud-secs, #hudSecs, #timerSeconds, #timer-seconds, #seconds, .cd-seconds, .countdown-seconds, [data-countdown="seconds"]');
                    secEls.forEach(el => { el.textContent = s; });
                }

                refreshUniversalCountdown();
                if (!window._universalCountdownTimer) {
                    window._universalCountdownTimer = setInterval(refreshUniversalCountdown, 1000);
                }

                // 6. Update tombol Simpan ke Google Calendar
                document.querySelectorAll('a[href*="calendar.google.com"]').forEach(link => {
                    try {
                        const url = new URL(link.href);
                        const ymd = targetDt.toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z';
                        const endDt = new Date(targetDt.getTime() + (4 * 3600 * 1000));
                        const ymdEnd = endDt.toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z';
                        url.searchParams.set('dates', `${ymd}/${ymdEnd}`);
                        link.href = url.toString();
                    } catch(e) {}
                });
            } catch(e) {
                console.warn('applyUniversalWeddingDate error:', e);
            }
        }
        window.applyUniversalWeddingDate = applyUniversalWeddingDate;

        function hydratePreviewFromStorage() {
            try {
                const urlParams = new URLSearchParams(window.location.search);
                const isPreview = urlParams.get('preview') === '1' || {{ !empty($isDemo) ? 'true' : 'false' }};
                if (!isPreview) return;

                // 1. Hydrate Guest Name
                const guestFromUrl = urlParams.get('to') || urlParams.get('guest');
                const guestFromStorage = safeGetItem('dkarsa_preview_guest_name');
                const effectiveGuest = (guestFromUrl && guestFromUrl.trim() !== '') ? guestFromUrl : guestFromStorage;
                if (effectiveGuest && effectiveGuest.trim() !== '') {
                    const gCover = document.getElementById('previewGuestNameCover') || document.getElementById('guestNameDisplay');
                    const gMain = document.getElementById('previewGuestNameMain') || document.getElementById('previewGuestNameMainTag') || document.getElementById('guest-name');
                    const rsvpName = document.getElementById('rsvp-name') || document.getElementById('guest-input-name') || document.getElementById('guestNameInput') || document.querySelector('input[name="name"]');
                    if (gCover) gCover.textContent = effectiveGuest;
                    if (gMain) gMain.textContent = effectiveGuest;
                    if (rsvpName) rsvpName.value = effectiveGuest;
                }

                // 2. Hydrate Gallery Photos
                let galleryList = getStoredData('dkarsa_preview_gallery_photos');
                if (!galleryList) {
                    const draft = getStoredData('dkarsa_builder_draft_v1');
                    if (draft && Array.isArray(draft.gallery_photos) && draft.gallery_photos.length > 0) {
                        galleryList = draft.gallery_photos.map(p => (typeof p === 'object' && p ? (p.dataUrl || p.image || p.url) : p));
                    }
                }
                if (Array.isArray(galleryList) && galleryList.length > 0) {
                    const validPhotos = galleryList.filter(Boolean);
                    if (validPhotos.length > 0) {
                        if (typeof window.renderDynamicGallery === 'function') {
                            window.renderDynamicGallery(validPhotos);
                        } else {
                            const galContainer = document.getElementById('galleryGridContainer') || 
                                                 document.getElementById('previewGalleryGrid') || 
                                                 document.getElementById('galleryContainer') || 
                                                 document.getElementById('galleryCylinder');
                            if (galContainer) {
                                galContainer.innerHTML = validPhotos.map((src, i) => `
                                    <div class="aspect-square rounded-xl overflow-hidden bg-surface-container shadow-sm border border-outline-variant/30">
                                        <img src="${src}" alt="Foto Galeri #${i + 1}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                `).join('');
                            }
                        }
                    }
                }

                // 3. Hydrate Events / Rundown
                let eventList = getStoredData('dkarsa_preview_events');
                if (!eventList) {
                    const draft = getStoredData('dkarsa_builder_draft_v1');
                    if (draft && Array.isArray(draft.events) && draft.events.length > 0) {
                        eventList = draft.events;
                    }
                }
                if (!eventList && urlParams.get('events_json')) {
                    try {
                        eventList = JSON.parse(urlParams.get('events_json'));
                    } catch(e) {}
                }
                if (Array.isArray(eventList) && eventList.length > 0) {
                    if (typeof window.renderDynamicEvents === 'function') {
                        window.renderDynamicEvents(eventList);
                    }
                    const ev0 = eventList[0];
                    if (ev0) {
                        const effectiveMap = ev0.maps_url || urlParams.get('maps_url') || urlParams.get('google_maps_url');
                        if (effectiveMap) {
                            const allMaps = document.querySelectorAll('#previewMapsLinkMain, #previewMapsLink, a[href*="maps.google.com"], a[href*="maps.app.goo.gl"], a[href*="goo.gl/maps"]');
                            allMaps.forEach(el => { el.href = effectiveMap; });
                        }
                        const elV = document.getElementById('previewVenueNameMain') || document.getElementById('previewVenueName');
                        if (elV && ev0.venue_name) elV.textContent = ev0.venue_name;
                        const elA = document.getElementById('previewVenueAddressMain') || document.getElementById('previewVenueAddress');
                        if (elA && ev0.address) elA.textContent = ev0.address;
                    }
                }

                // Direct Maps URL override if passed via URL parameters
                const directMaps = urlParams.get('maps_url') || urlParams.get('google_maps_url');
                if (directMaps) {
                    const allMaps = document.querySelectorAll('#previewMapsLinkMain, #previewMapsLink, a[href*="maps.google.com"], a[href*="maps.app.goo.gl"], a[href*="goo.gl/maps"]');
                    allMaps.forEach(el => { el.href = directMaps; });
                }

                // 4. Hydrate Groom / Star Photo
                const groomPhoto = safeGetItem('dkarsa_preview_groom_photo');
                if (groomPhoto) {
                    const el = document.getElementById('previewGroomPhotoImg');
                    if (el) el.src = groomPhoto;
                    const bgHeader = document.getElementById('previewHeaderBg');
                    if (bgHeader) bgHeader.style.backgroundImage = `url('${groomPhoto}')`;
                }

                // 4b. Hydrate Wedding / Event Date, Calendar, and Countdown
                const weddingDateFromUrl = urlParams.get('wedding_date');
                const weddingDateFromStorage = safeGetItem('dkarsa_preview_wedding_date');
                const effectiveWeddingDate = weddingDateFromUrl || weddingDateFromStorage;
                if (effectiveWeddingDate) {
                    applyUniversalWeddingDate(effectiveWeddingDate);
                } else if (eventList && eventList.length > 0 && eventList[0].date) {
                    applyUniversalWeddingDate(eventList[0].date);
                }

                // 5. Hydrate Cover Photo
                const coverPhoto = safeGetItem('dkarsa_preview_cover_photo');
                if (coverPhoto) {
                    const el = document.getElementById('previewCoverPhotoImg');
                    if (el) el.src = coverPhoto;
                    const bgCover = document.getElementById('previewCoverBg');
                    if (bgCover) bgCover.style.backgroundImage = `url('${coverPhoto}')`;
                }

                // 6. Hydrate Bride Photo
                const bridePhoto = safeGetItem('dkarsa_preview_bride_photo');
                if (bridePhoto) {
                    const el = document.getElementById('previewBridePhotoImg');
                    if (el) el.src = bridePhoto;
                }
            } catch (err) {
                console.warn('Hydrate preview sync caught:', err);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', hydratePreviewFromStorage);
        } else {
            hydratePreviewFromStorage();
        }

        try {
            window.addEventListener('storage', function(e) {
                if (e.key && (e.key === 'dkarsa_preview_wedding_date' || e.key === 'wedding_date') && e.newValue) {
                    applyUniversalWeddingDate(e.newValue);
                }
                if (e.key && e.key.startsWith('dkarsa_')) {
                    hydratePreviewFromStorage();
                }
            });
        } catch(e) {}

        // Global postMessage dispatcher for Live Preview iframe
        try {
            window.addEventListener('message', function(event) {
                const data = event.data;
                if (!data || typeof data !== 'object') return;

                if (data.type === 'UPDATE_PREVIEW_DATE' && (data.date || data.value || data.wedding_date)) {
                    applyUniversalWeddingDate(data.date || data.value || data.wedding_date);
                }

                if (data.type === 'UPDATE_PREVIEW_EVENTS' && Array.isArray(data.events) && data.events.length > 0) {
                    if (typeof window.renderDynamicEvents === 'function') {
                        window.renderDynamicEvents(data.events);
                    }
                    const ev0 = data.events[0];
                    if (ev0) {
                        if (ev0.date) {
                            applyUniversalWeddingDate(ev0.date);
                        }
                        if (ev0.maps_url) {
                            const allMaps = document.querySelectorAll('#previewMapsLinkMain, #previewMapsLink, a[href*="maps.google.com"], a[href*="maps.app.goo.gl"], a[href*="goo.gl/maps"]');
                            allMaps.forEach(el => { el.href = ev0.maps_url; });
                        }
                    }
                }

                if (data.type === 'UPDATE_PREVIEW_FIELD') {
                    if ((data.field === 'wedding_date' || data.field === 'date') && data.value) {
                        applyUniversalWeddingDate(data.value);
                    }
                    if ((data.field === 'maps_url' || data.field === 'google_maps_url') && data.value) {
                        const allMaps = document.querySelectorAll('#previewMapsLinkMain, #previewMapsLink, a[href*="maps.google.com"], a[href*="maps.app.goo.gl"], a[href*="goo.gl/maps"]');
                        allMaps.forEach(el => { el.href = data.value; });
                    }
                    if (data.field === 'venue_name' && data.value) {
                        const venueEls = document.querySelectorAll('#previewVenueNameMain, #previewVenueName');
                        venueEls.forEach(el => { el.textContent = data.value; });
                    }
                    if ((data.field === 'venue_address' || data.field === 'address') && data.value) {
                        const addrEls = document.querySelectorAll('#previewVenueAddressMain, #previewVenueAddress');
                        addrEls.forEach(el => { el.textContent = data.value; });
                    }
                }
            });
        } catch(e) {}

        // Send ready handshake to builder parent if inside an iframe
        try {
            if (window.parent && window.parent !== window) {
                window.parent.postMessage({ type: 'PREVIEW_IFRAME_READY' }, '*');
            }
        } catch(e) {}
    })();
</script>
