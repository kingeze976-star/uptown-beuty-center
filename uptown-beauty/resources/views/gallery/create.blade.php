<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Gallery Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('gallery._form')

                    <div class="mt-6 flex items-center gap-3">
                        <x-primary-button>{{ __('Upload') }}</x-primary-button>
                        <a href="{{ route('gallery.manage') }}"
                           class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>