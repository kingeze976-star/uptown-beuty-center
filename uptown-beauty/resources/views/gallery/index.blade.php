<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    @push('styles')
    <style>
        .gallery-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(200px,1fr));
            grid-auto-rows:200px;
            grid-auto-flow:dense;
            gap:14px;
        }
        .tile{position:relative;padding:0;border:0;margin:0;border-radius:14px;overflow:hidden;background:#f3f4f6;cursor:pointer;animation:tileIn .5s cubic-bezier(.2,.7,.3,1) both}
        .tile.is-hidden{display:none}
        .tile:focus-visible{outline:2px solid #c9a227;outline-offset:3px}
        .tile img{display:block;width:100%;height:100%;object-fit:cover;transition:transform .6s cubic-bezier(.2,.7,.3,1)}
        .tile:hover img,.tile:focus-visible img{transform:scale(1.06)}
        .tile::after{content:"";position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.78),rgba(0,0,0,0) 55%);opacity:0;transition:opacity .35s;pointer-events:none}
        .tile:hover::after,.tile:focus-visible::after{opacity:1}
        .tile__caption{position:absolute;z-index:1;left:0;right:0;bottom:0;padding:14px 16px;text-align:left;color:#fff;font-size:.85rem;letter-spacing:.03em;opacity:0;transform:translateY(8px);transition:opacity .35s,transform .35s}
        .tile:hover .tile__caption,.tile:focus-visible .tile__caption{opacity:1;transform:none}
        .tile--featured{grid-column:span 2;grid-row:span 2}
        @keyframes tileIn{from{opacity:0;transform:translateY(14px) scale(.98)}to{opacity:1;transform:none}}
        .filter{appearance:none;padding:9px 18px;border:1px solid #e5e7eb;border-radius:999px;background:#fff;color:#6b7280;font-size:.85rem;letter-spacing:.04em;cursor:pointer;transition:color .25s,border-color .25s,background .25s}
        .filter:hover{color:#111827;border-color:#9ca3af}
        .filter.is-active{background:#c9a227;border-color:#c9a227;color:#141414;font-weight:600}

        .lightbox{position:fixed;inset:0;z-index:100;display:flex;align-items:center;justify-content:center;padding:20px;background:rgba(8,8,10,.94);-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);opacity:0;visibility:hidden;transition:opacity .3s,visibility .3s}
        .lightbox.is-open{opacity:1;visibility:visible}
        .lb-figure{margin:0;text-align:center;max-width:min(92vw,1000px)}
        .lb-img{display:block;margin:0 auto;max-width:100%;max-height:76vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,.6)}
        .lb-caption{margin-top:14px;color:#a09b93;font-size:.9rem}
        .lb-count{opacity:.55;margin-left:8px}
        .lb-btn{position:absolute;display:grid;place-items:center;width:46px;height:46px;border:1px solid rgba(255,255,255,.16);border-radius:50%;background:rgba(255,255,255,.08);color:#fff;font-size:1.1rem;cursor:pointer;transition:background .2s,color .2s,border-color .2s}
        .lb-btn:hover{background:#c9a227;border-color:#c9a227;color:#111}
        .lb-btn:focus-visible{outline:2px solid #c9a227;outline-offset:3px}
        .lb-close{top:18px;right:18px}
        .lb-prev{left:18px;top:50%;transform:translateY(-50%)}
        .lb-next{right:18px;top:50%;transform:translateY(-50%)}
        @media(max-width:560px){.gallery-grid{grid-template-columns:repeat(2,1fr);grid-auto-rows:150px}.lb-btn{width:40px;height:40px}.lb-prev{left:8px}.lb-next{right:8px}.lb-img{max-height:68vh}}
        @media(prefers-reduced-motion:reduce){*{animation-duration:.001ms!important;transition-duration:.001ms!important}}
    </style>
    @endpush

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Heading --}}
            <header class="text-center mb-8">
                <p class="text-xs tracking-[0.22em] uppercase text-amber-600 mb-2">Our Work</p>
                <h1 class="font-serif text-3xl md:text-4xl font-semibold text-gray-900">Gallery</h1>
                <p class="mt-2 text-sm text-gray-600">
                    Real clients, real transformations — hair, nails, makeup &amp; spa.
                </p>

                @auth
                    <p class="mt-4">
                        <a href="{{ route('gallery.manage') }}"
                           class="text-amber-600 text-sm tracking-wide hover:underline">
                            Manage gallery →
                        </a>
                    </p>
                @endauth
            </header>

            {{-- Filters --}}
            <div id="filters" class="flex flex-wrap justify-center gap-2 mb-6" role="group" aria-label="Filter by category">
                <button type="button" class="filter is-active" data-filter="all" aria-pressed="true">All</button>
                @foreach ($categories as $category)
                    <button type="button" class="filter" data-filter="{{ $category }}" aria-pressed="false">
                        {{ \Illuminate\Support\Str::headline($category) }}
                    </button>
                @endforeach
            </div>

            {{-- Grid --}}
            <div id="gallery" class="gallery-grid">
                @forelse ($galleries as $i => $gallery)
                    <button
                        type="button"
                        class="tile {{ $gallery->is_featured ? 'tile--featured' : '' }}"
                        data-category="{{ $gallery->category }}"
                        data-src="{{ $gallery->image_url }}"
                        data-caption="{{ $gallery->title }}"
                        data-alt="{{ $gallery->alt_text ?? $gallery->title }}"
                        style="animation-delay: {{ min($i * 40, 400) }}ms"
                        aria-label="View {{ $gallery->title }}"
                    >
                        <img src="{{ $gallery->image_url }}"
                             alt="{{ $gallery->alt_text ?? $gallery->title }}"
                             loading="lazy" decoding="async">
                        <span class="tile__caption">{{ $gallery->title }}</span>
                    </button>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-500">
                        No images yet.
                        @auth
                            <a href="{{ route('gallery.create') }}" class="text-amber-600 hover:underline">
                                Upload the first one →
                            </a>
                        @endauth
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Lightbox --}}
    <div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Image viewer">
        <button class="lb-btn lb-close" id="lbClose" type="button" aria-label="Close viewer">✕</button>
        <button class="lb-btn lb-prev" id="lbPrev" type="button" aria-label="Previous image">‹</button>
        <button class="lb-btn lb-next" id="lbNext" type="button" aria-label="Next image">›</button>
        <figure class="lb-figure">
            <img class="lb-img" id="lbImg" src="" alt="">
            <figcaption class="lb-caption">
                <span id="lbCaption"></span><span class="lb-count" id="lbCount"></span>
            </figcaption>
        </figure>
    </div>

    @push('scripts')
    <script>
    (function () {
        const galleryEl = document.getElementById('gallery');
        const filtersEl = document.getElementById('filters');
        const lightbox  = document.getElementById('lightbox');
        const lbImg     = document.getElementById('lbImg');
        const lbCaption = document.getElementById('lbCaption');
        const lbCount   = document.getElementById('lbCount');
        const lbClose   = document.getElementById('lbClose');
        const lbPrev    = document.getElementById('lbPrev');
        const lbNext    = document.getElementById('lbNext');

        let visible = [];
        let index = 0;
        let lastFocused = null;

        filtersEl.addEventListener('click', function (e) {
            const btn = e.target.closest('.filter');
            if (!btn) return;

            filtersEl.querySelectorAll('.filter').forEach(function (b) {
                const on = b === btn;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-pressed', String(on));
            });

            const filter = btn.dataset.filter;
            galleryEl.querySelectorAll('.tile').forEach(function (tile) {
                const show = filter === 'all' || tile.dataset.category === filter;
                tile.classList.toggle('is-hidden', !show);
            });
        });

        function currentVisibleTiles() {
            return Array.from(galleryEl.querySelectorAll('.tile:not(.is-hidden)'));
        }

        function open(tile) {
            visible = currentVisibleTiles();
            index = visible.indexOf(tile);
            lastFocused = document.activeElement;
            paint();
            lightbox.classList.add('is-open');
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden');
            lbClose.focus();
        }

        function close() {
            lightbox.classList.remove('is-open');
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('overflow-hidden');
            if (lastFocused) lastFocused.focus();
        }

        function paint() {
            const tile = visible[index];
            if (!tile) return;
            lbImg.src = tile.dataset.src;
            lbImg.alt = tile.dataset.alt;
            lbCaption.textContent = tile.dataset.caption;
            lbCount.textContent = (index + 1) + ' / ' + visible.length;
        }

        function step(dir) {
            index = (index + dir + visible.length) % visible.length;
            paint();
        }

        galleryEl.addEventListener('click', function (e) {
            const tile = e.target.closest('.tile');
            if (tile) open(tile);
        });

        lbClose.addEventListener('click', close);
        lbPrev.addEventListener('click', function () { step(-1); });
        lbNext.addEventListener('click', function () { step(1); });

        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) close();
        });

        document.addEventListener('keydown', function (e) {
            if (!lightbox.classList.contains('is-open')) return;
            if (e.key === 'Escape') close();
            else if (e.key === 'ArrowRight') step(1);
            else if (e.key === 'ArrowLeft') step(-1);
        });

        let touchX = null;
        lightbox.addEventListener('touchstart', function (e) {
            touchX = e.changedTouches[0].clientX;
        }, { passive: true });
        lightbox.addEventListener('touchend', function (e) {
            if (touchX === null) return;
            const dx = e.changedTouches[0].clientX - touchX;
            if (Math.abs(dx) > 50) step(dx < 0 ? 1 : -1);
            touchX = null;
        }, { passive: true });
    })();
    </script>
    @endpush
</x-app-layout>