<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services — Uptown Beauty</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased">

    <!-- Header -->
    <header class="sticky top-0 z-30 bg-[#FAF8F5]/90 backdrop-blur border-b border-stone-200/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="<?php echo e(route('home')); ?>" class="flex items-baseline gap-2">
                <span class="text-lg sm:text-xl font-semibold tracking-tight text-stone-900">Uptown Beauty</span>
                <span class="hidden sm:inline-block text-[11px] uppercase tracking-[0.2em] text-stone-500">Studio</span>
            </a>

            <div class="flex items-center gap-4 text-sm">
                <a href="<?php echo e(route('home')); ?>" class="text-stone-600 hover:text-stone-900 transition">Home</a>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('services.create')); ?>" class="inline-flex items-center rounded-lg bg-stone-900 px-3.5 py-2 font-medium text-white hover:bg-stone-800 transition">
                        + Add Service
                    </a>
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-stone-700 hover:text-stone-950 font-medium">Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-stone-700 hover:text-stone-950 font-medium">Log in</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <!-- Status Banner -->
        <?php if(session('status')): ?>
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <!-- Page Heading -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-8 border-b border-stone-200/80">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-800/80">Treatment Menu</p>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-stone-900 mt-1">Our Services</h1>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-xl">
                    Transparent pricing, realistic session times, and tailored care for every visit.
                </p>
            </div>

            <!-- Category Filter Pills -->
            <?php if($categories->isNotEmpty()): ?>
                <div class="flex flex-wrap items-center gap-2">
                    <a
                        href="<?php echo e(route('services.index')); ?>"
                        class="rounded-full px-3.5 py-1.5 text-xs font-medium transition <?php echo e(!request('category') ? 'bg-stone-900 text-white' : 'bg-white border border-stone-200 text-stone-700 hover:bg-stone-100'); ?>"
                    >
                        All
                    </a>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a
                            href="<?php echo e(route('services.index', ['category' => $category])); ?>"
                            class="rounded-full px-3.5 py-1.5 text-xs font-medium transition <?php echo e(request('category') === $category ? 'bg-stone-900 text-white' : 'bg-white border border-stone-200 text-stone-700 hover:bg-stone-100'); ?>"
                        >
                            <?php echo e($category); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Services Grid -->
        <?php if($services->isEmpty()): ?>
            <div class="mt-12 rounded-2xl border border-dashed border-stone-300 bg-white p-10 text-center">
                <p class="text-stone-700 font-medium">No services listed yet.</p>
                <p class="text-sm text-stone-500 mt-1">Once services are added, they will appear here automatically.</p>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('services.create')); ?>" class="mt-4 inline-flex items-center rounded-lg bg-stone-900 px-4 py-2 text-sm font-medium text-white hover:bg-stone-800 transition">
                        Add Your First Service
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="rounded-2xl border border-stone-200/90 bg-white p-6 flex flex-col justify-between shadow-sm">
                        <div>
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-[11px] font-semibold uppercase tracking-[0.16em] text-amber-800/80">
                                    <?php echo e($service->category); ?>

                                </span>
                                <span class="text-xs text-stone-500">
                                    <?php echo e($service->duration_minutes); ?> mins
                                </span>
                            </div>

                            <h2 class="text-lg font-semibold text-stone-900 mt-2">
                                <a href="<?php echo e(route('services.show', $service)); ?>" class="hover:text-amber-900 transition">
                                    <?php echo e($service->name); ?>

                                </a>
                            </h2>

                            <?php if($service->description): ?>
                                <p class="text-sm text-stone-600 mt-2 leading-relaxed">
                                    <?php echo e($service->description); ?>

                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                            <span class="text-base font-bold text-stone-900">
                                &#8358;<?php echo e(number_format($service->price, 2)); ?>

                            </span>

                            <?php if(auth()->guard()->check()): ?>
                                <div class="flex items-center gap-3 text-xs font-medium">
                                    <a href="<?php echo e(route('services.edit', $service)); ?>" class="text-stone-700 hover:text-stone-950 underline underline-offset-4">
                                        Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('services.destroy', $service)); ?>" onsubmit="return confirm('Delete this service?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(route('services.show', $service)); ?>" class="text-xs font-semibold text-stone-900 hover:text-amber-800 transition">
                                    Details &rarr;
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </main>

</body>
</html><?php /**PATH C:\Users\user\Desktop\uptown beuty center\uptown-beauty\resources\views/services/index.blade.php ENDPATH**/ ?>