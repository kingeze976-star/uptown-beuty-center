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
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Gallery Images')); ?>

            </h2>
            <a href="<?php echo e(route('gallery.create')); ?>"
               class="inline-flex items-center px-4 py-2 bg-amber-500 text-gray-900 text-sm font-medium rounded-md hover:bg-amber-400">
                + Upload image
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <?php if(session('status')): ?>
                <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 text-left">
                        <tr>
                            <th class="px-4 py-3">Preview</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Featured</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-4 py-3">
                                    <img src="<?php echo e($gallery->image_url); ?>"
                                         alt=""
                                         class="w-16 h-16 object-cover rounded-md">
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <?php echo e($gallery->title); ?>

                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    <?php echo e(\Illuminate\Support\Str::headline($gallery->category)); ?>

                                </td>
                                <td class="px-4 py-3">
                                    <?php if($gallery->is_featured): ?>
                                        <span class="px-2 py-1 text-xs bg-amber-100 text-amber-800 rounded">Yes</span>
                                    <?php else: ?>
                                        <span class="text-gray-400">—</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-end gap-2">
                                        <a href="<?php echo e(route('gallery.edit', $gallery)); ?>"
                                           class="px-3 py-1.5 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">
                                            Edit
                                        </a>
                                        <form method="POST" action="<?php echo e(route('gallery.destroy', $gallery)); ?>"
                                              onsubmit="return confirm('Delete this image?')">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                    class="px-3 py-1.5 bg-red-600 text-white rounded hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-4 py-12 text-center text-gray-500">
                                    No images yet.
                                    <a href="<?php echo e(route('gallery.create')); ?>" class="text-amber-600 hover:underline">
                                        Upload the first one →
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <?php echo e($galleries->links()); ?>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\user\Desktop\uptown beuty center\uptown-beauty\resources\views/gallery/manage.blade.php ENDPATH**/ ?>