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

                if (data.type === 'UPDATE_PREVIEW_EVENTS' && Array.isArray(data.events) && data.events.length > 0) {
                    if (typeof window.renderDynamicEvents === 'function') {
                        window.renderDynamicEvents(data.events);
                    }
                    const ev0 = data.events[0];
                    if (ev0 && ev0.maps_url) {
                        const allMaps = document.querySelectorAll('#previewMapsLinkMain, #previewMapsLink, a[href*="maps.google.com"], a[href*="maps.app.goo.gl"], a[href*="goo.gl/maps"]');
                        allMaps.forEach(el => { el.href = ev0.maps_url; });
                    }
                }

                if (data.type === 'UPDATE_PREVIEW_FIELD') {
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
