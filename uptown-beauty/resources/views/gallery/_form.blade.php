@php $current = $gallery ?? null; @endphp

<div class="space-y-5">
    {{-- Title --}}
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                      :value="old('title', $current->title ?? '')" required />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    {{-- Category --}}
    <div>
        <x-input-label for="category" :value="__('Category')" />
        <x-text-input id="category" name="category" type="text" class="mt-1 block w-full"
                      placeholder="hair / nails / makeup / spa"
                      :value="old('category', $current->category ?? '')" required />
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    {{-- Alt text --}}
    <div>
        <x-input-label for="alt_text" :value="__('Alt text (optional)')" />
        <x-text-input id="alt_text" name="alt_text" type="text" class="mt-1 block w-full"
                      :value="old('alt_text', $current->alt_text ?? '')" />
        <x-input-error :messages="$errors->get('alt_text')" class="mt-2" />
    </div>

    {{-- Featured --}}
    <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="is_featured" value="1"
               @checked(old('is_featured', $current->is_featured ?? false))
               class="rounded border-gray-300 text-amber-600 focus:ring-amber-500">
        <span class="text-sm text-gray-700">Featured (large tile in the grid)</span>
    </label>

    {{-- Image --}}
    <div>
        <x-input-label for="image"
            :value="$current ? __('Image (leave blank to keep current)') : __('Image')" />
        <input id="image" name="image" type="file" accept="image/*"
               class="mt-1 block w-full text-sm text-gray-700"
               {{ $current ? '' : 'required' }}>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
</div>