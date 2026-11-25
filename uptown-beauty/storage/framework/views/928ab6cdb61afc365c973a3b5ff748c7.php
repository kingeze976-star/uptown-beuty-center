<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service — Uptown Beauty</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased">

    <main class="max-w-2xl mx-auto px-4 sm:px-6 py-12">
        <div class="mb-6">
            <a href="<?php echo e(route('services.index')); ?>" class="text-sm text-stone-600 hover:text-stone-900">&larr; Back to services</a>
            <h1 class="text-2xl font-bold text-stone-900 mt-2">Add a New Service</h1>
            <p class="text-sm text-stone-600 mt-1">Create a treatment option for the Uptown Beauty menu.</p>
        </div>

        <form method="POST" action="<?php echo e(route('services.store')); ?>" class="rounded-2xl bg-white border border-stone-200/90 p-6 sm:p-8 shadow-sm space-y-5">
            <?php echo csrf_field(); ?>

            <div>
                <label for="name" class="block text-sm font-medium text-stone-800">Service Name</label>
                <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" required placeholder="e.g. Hydrating Facial"
                    class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="category" class="block text-sm font-medium text-stone-800">Category</label>
                    <select id="category" name="category" required
                        class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                        <option value="Hair" <?php if(old('category') === 'Hair'): echo 'selected'; endif; ?>>Hair</option>
                        <option value="Skin" <?php if(old('category') === 'Skin'): echo 'selected'; endif; ?>>Skin</option>
                        <option value="Nails" <?php if(old('category') === 'Nails'): echo 'selected'; endif; ?>>Nails</option>
                        <option value="Grooming" <?php if(old('category') === 'Grooming'): echo 'selected'; endif; ?>>Grooming</option>
                    </select>
                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="duration_minutes" class="block text-sm font-medium text-stone-800">Duration (mins)</label>
                    <input id="duration_minutes" name="duration_minutes" type="number" min="10" max="480" value="<?php echo e(old('duration_minutes', 60)); ?>" required
                        class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                    <?php $__errorArgs = ['duration_minutes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-stone-800">Price (&#8358;)</label>
                    <input id="price" name="price" type="number" step="0.01" min="0" value="<?php echo e(old('price')); ?>" required placeholder="15000"
                        class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-stone-800">Description</label>
                <textarea id="description" name="description" rows="3" placeholder="Briefly describe what is included in this session..."
                    class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="flex items-center gap-2">
                <input id="is_active" name="is_active" type="checkbox" value="1" checked
                    class="rounded border-stone-300 text-stone-900 focus:ring-stone-900">
                <label for="is_active" class="text-sm text-stone-700">Visible on public service menu</label>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <a href="<?php echo e(route('services.index')); ?>" class="rounded-lg border border-stone-300 px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-100">
                    Cancel
                </a>
                <button type="submit" class="rounded-lg bg-stone-900 px-5 py-2 text-sm font-medium text-white hover:bg-stone-800">
                    Save Service
                </button>
            </div>
        </form>
    </main>

</body>
</html><?php /**PATH C:\Users\user\Desktop\uptown beuty center\uptown-beauty\resources\views/services/create.blade.php ENDPATH**/ ?>