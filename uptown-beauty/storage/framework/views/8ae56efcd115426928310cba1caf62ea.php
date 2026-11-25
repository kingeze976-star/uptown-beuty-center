<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Gallery')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <?php $__env->startPush('styles'); ?>
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
    <?php $__env->stopPush(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <header class="text-center mb-8">
                <p class="text-xs tracking-[0.22em] uppercase text-amber-600 mb-2">Our Work</p>
                <h1 class="font-serif text-3xl md:text-4xl font-semibold text-gray-900">Gallery</h1>
                <p class="mt-2 text-sm text-gray-600">
                    Real clients, real transformations — hair, nails, makeup &amp; spa.
                </p>

                <?php if(auth()->guard()->check()): ?>
                    <p class="mt-4">
                        <a href="<?php echo e(route('gallery.manage')); ?>"
                           class="text-amber-600 text-sm tracking-wide hover:underline">
                            Manage gallery →
                        </a>
                    </p>
                <?php endif; ?>
            </header>

            
            <div id="filters" class="flex flex-wrap justify-center gap-2 mb-6" role="group" aria-label="Filter by category">
                <button type="button" class="filter is-active" data-filter="all" aria-pressed="true">All</button>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="filter" data-filter="<?php echo e($category); ?>" aria-pressed="false">
                        <?php echo e(\Illuminate\Support\Str::headline($category)); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div id="gallery" class="gallery-grid">
                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <button
                        type="button"
                        class="tile <?php echo e($gallery->is_featured ? 'tile--featured' : ''); ?>"
                        data-category="<?php echo e($gallery->category); ?>"
                        data-src="<?php echo e($gallery->image_url); ?>"
                        data-caption="<?php echo e($gallery->title); ?>"
                        data-alt="<?php echo e($gallery->alt_text ?? $gallery->title); ?>"
                        style="animation-delay: <?php echo e(min($i * 40, 400)); ?>ms"
                        aria-label="View <?php echo e($gallery->title); ?>"
                    >
                        <img src="<?php echo e($gallery->image_url); ?>"
                             alt="<?php echo e($gallery->alt_text ?? $gallery->title); ?>"
                             loading="lazy" decoding="async">
                        <span class="tile__caption"><?php echo e($gallery->title); ?></span>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-16 text-gray-500">
                        No images yet.
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('gallery.create')); ?>" class="text-amber-600 hover:underline">
                                Upload the first one →
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
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

    <?php $__env->startPush('scripts'); ?>
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
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\user\Desktop\uptown beuty center\uptown-beauty\resources\views/gallery/index.blade.php ENDPATH**/ ?>