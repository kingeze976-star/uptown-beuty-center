<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Gallery Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- Success / error banners --}}
                @if (session('status'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Current image preview --}}
                <div class="mb-6">
                    <p class="text-sm text-gray-500 mb-2">Current image</p>
                    <img src="{{ $gallery->image_url }}"
                         alt="{{ $gallery->alt_text ?? $gallery->title }}"
                         class="w-40 h-40 object-cover rounded-md border border-gray-200">
                </div>

                {{-- Edit form --}}
                <form method="POST"
                      action="{{ route('gallery.update', $gallery) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('gallery._form')

                    <div class="mt-6 flex items-center gap-3">
                        <x-primary-button>{{ __('Save changes') }}</x-primary-button>
                        <a href="{{ route('gallery.manage') }}"
                           class="text-sm text-gray-600 hover:text-gray-900">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>