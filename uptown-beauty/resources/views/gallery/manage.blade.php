<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gallery Images') }}
            </h2>
            <a href="{{ route('gallery.create') }}"
               class="inline-flex items-center px-4 py-2 bg-amber-500 text-gray-900 text-sm font-medium rounded-md hover:bg-amber-400">
                + Upload image
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                    {{ session('status') }}
                </div>
            @endif

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
                        @forelse ($galleries as $gallery)
                            <tr>
                                <td class="px-4 py-3">
                                    <img src="{{ $gallery->image_url }}"
                                         alt=""
                                         class="w-16 h-16 object-cover rounded-md">
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $gallery->title }}
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    {{ \Illuminate\Support\Str::headline($gallery->category) }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($gallery->is_featured)
                                        <span class="px-2 py-1 text-xs bg-amber-100 text-amber-800 rounded">Yes</span>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('gallery.edit', $gallery) }}"
                                           class="px-3 py-1.5 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('gallery.destroy', $gallery) }}"
                                              onsubmit="return confirm('Delete this image?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1.5 bg-red-600 text-white rounded hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-12 text-center text-gray-500">
                                    No images yet.
                                    <a href="{{ route('gallery.create') }}" class="text-amber-600 hover:underline">
                                        Upload the first one →
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</x-app-layout>