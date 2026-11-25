<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $service->name }} — Uptown Beauty</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased">

    <main class="max-w-2xl mx-auto px-4 sm:px-6 py-12">
        <div class="mb-6">
            <a href="{{ route('services.index') }}" class="text-sm text-stone-600 hover:text-stone-900">&larr; Back to services</a>
            <h1 class="text-2xl font-bold text-stone-900 mt-2">Edit Service</h1>
        </div>

        <form method="POST" action="{{ route('services.update', $service) }}" class="rounded-2xl bg-white border border-stone-200/90 p-6 sm:p-8 shadow-sm space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-stone-800">Service Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $service->name) }}" required
                    class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="category" class="block text-sm font-medium text-stone-800">Category</label>
                    <select id="category" name="category" required
                        class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                        @foreach (['Hair', 'Skin', 'Nails', 'Grooming'] as $cat)
                            <option value="{{ $cat }}" @selected(old('category', $service->category) === $cat)>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="duration_minutes" class="block text-sm font-medium text-stone-800">Duration (mins)</label>
                    <input id="duration_minutes" name="duration_minutes" type="number" min="10" max="480" value="{{ old('duration_minutes', $service->duration_minutes) }}" required
                        class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                    @error('duration_minutes') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-stone-800">Price (&#8358;)</label>
                    <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', $service->price) }}" required
                        class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">
                    @error('price') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-stone-800">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="mt-1.5 w-full rounded-lg border-stone-300 text-sm focus:border-stone-900 focus:ring-stone-900">{{ old('description', $service->description) }}</textarea>
                @error('description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', $service->is_active))
                    class="rounded border-stone-300 text-stone-900 focus:ring-stone-900">
                <label for="is_active" class="text-sm text-stone-700">Visible on public service menu</label>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <a href="{{ route('services.index') }}" class="rounded-lg border border-stone-300 px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-100">
                    Cancel
                </a>
                <button type="submit" class="rounded-lg bg-stone-900 px-5 py-2 text-sm font-medium text-white hover:bg-stone-800">
                    Update Service
                </button>
            </div>
        </form>
    </main>

</body>
</html>