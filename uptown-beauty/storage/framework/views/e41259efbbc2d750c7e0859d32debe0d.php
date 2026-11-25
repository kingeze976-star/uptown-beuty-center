<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($service->name); ?> — Uptown Beauty</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased">

    <main class="max-w-3xl mx-auto px-4 sm:px-6 py-12">
        <a href="<?php echo e(route('services.index')); ?>" class="text-sm text-stone-600 hover:text-stone-900">&larr; All services</a>

        <div class="mt-4 rounded-2xl bg-white border border-stone-200/90 p-6 sm:p-8 shadow-sm">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-800/80"><?php echo e($service->category); ?></span>
                <span class="text-xs text-stone-500"><?php echo e($service->duration_minutes); ?> minutes</span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-bold text-stone-900 mt-2"><?php echo e($service->name); ?></h1>
            <p class="text-xl font-bold text-stone-900 mt-3">&#8358;<?php echo e(number_format($service->price, 2)); ?></p>

            <?php if($service->description): ?>
                <p class="mt-5 text-stone-600 leading-relaxed"><?php echo e($service->description); ?></p>
            <?php endif; ?>

            <div class="mt-8 pt-6 border-t border-stone-100 flex items-center justify-between">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('services.edit', $service)); ?>" class="rounded-lg border border-stone-300 px-4 py-2 text-sm font-medium text-stone-800 hover:bg-stone-100">
                        Edit Service
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="rounded-lg bg-stone-900 px-5 py-2.5 text-sm font-medium text-white hover:bg-stone-800">
                        Create Account to Book
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </main>

</body>
</html><?php /**PATH C:\Users\user\Desktop\uptown beuty center\uptown-beauty\resources\views/services/show.blade.php ENDPATH**/ ?>