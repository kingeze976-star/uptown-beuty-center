<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uptown Beauty — Hair, Pedicures, Eyelashes &amp; Student Training</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700|plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
    </style>
</head>
<body class="bg-pink-100 text-rose-950 antialiased selection:bg-pink-300 selection:text-rose-950">

    <!-- Top Bar -->
    <div class="bg-rose-900 text-pink-100 text-xs py-2.5 px-4 text-center font-medium tracking-wide">
        Uptown Beauty &bull; All Hair Styles &bull; Pedicures &bull; Eyelashes &bull; Student Training
    </div>

    <!-- Navbar -->
    <header class="sticky top-0 z-40 bg-pink-100/95 backdrop-blur border-b border-pink-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <span class="h-9 w-9 rounded-full bg-rose-700 text-white font-display font-bold flex items-center justify-center text-lg">
                    U
                </span>
                <span class="font-display text-xl sm:text-2xl font-bold text-rose-950">
                    Uptown Beauty
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-rose-900">
                <a href="#pillars" class="hover:text-rose-600 transition">What We Do</a>
                <a href="#services" class="hover:text-rose-600 transition">Services</a>
                <a href="#training" class="hover:text-rose-600 transition">Training</a>
                <a href="#hours" class="hover:text-rose-600 transition">Hours</a>
            </nav>

            <div class="flex items-center gap-3 text-sm font-medium">
                @auth
                    <a href="{{ route('services.create') }}" class="hidden sm:inline-flex rounded-lg bg-pink-200 border border-pink-300 px-3 py-2 text-rose-950 hover:bg-pink-300 transition">
                        + Add Service
                    </a>
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-rose-700 px-4 py-2 text-white hover:bg-rose-800 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 text-rose-900 hover:text-rose-600 transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-lg bg-rose-700 px-4 py-2 text-white hover:bg-rose-800 transition">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <main class="bg-pink-100">
        <!-- Hero -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="inline-block rounded-full bg-pink-200 border border-pink-300 px-4 py-1 text-xs font-semibold uppercase tracking-wider text-rose-800">
                        Salon &amp; Student Training
                    </span>

                    <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-rose-950 leading-tight">
                        All kinds of hair, pedicures, eyelashes &amp; hands-on student training.
                    </h1>

                    <p class="text-base sm:text-lg text-rose-900/85 leading-relaxed max-w-2xl">
                        Welcome to Uptown Beauty—your pink salon for every hair style and texture, clean spa pedicures, neat eyelash extensions, and practical training for aspiring beauty students.
                    </p>

                    <div class="flex flex-wrap items-center gap-3.5 pt-2">
                        <a href="{{ route('services.index') }}" class="rounded-xl bg-rose-700 px-6 py-3.5 text-sm font-semibold text-white hover:bg-rose-800 transition">
                            Explore Services
                        </a>
                        @auth
                            <a href="{{ route('services.create') }}" class="rounded-xl bg-pink-200 border border-pink-300 px-6 py-3.5 text-sm font-semibold text-rose-950 hover:bg-pink-300 transition">
                                Add Service
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-xl bg-pink-200 border border-pink-300 px-6 py-3.5 text-sm font-semibold text-rose-950 hover:bg-pink-300 transition">
                                    Create Account
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-3xl bg-pink-200 border border-pink-300 overflow-hidden shadow-sm">
                        <div class="h-64 sm:h-72 bg-gradient-to-br from-pink-300 via-rose-200 to-pink-400">
                            <img
                                src="{{ asset('images/hero-salon.jpg') }}"
                                alt="Uptown Beauty pink salon"
                                class="w-full h-full object-cover"
                                onerror="this.style.display='none'"
                            />
                        </div>
                        <div class="p-6 bg-pink-200">
                            <p class="text-xs font-bold uppercase tracking-widest text-rose-700">Uptown Beauty</p>
                            <h2 class="font-display text-2xl font-bold text-rose-950 mt-1">
                                Hair &bull; Pedicures &bull; Lashes &bull; Training
                            </h2>
                            <p class="text-sm text-rose-900/80 mt-1.5">
                                Quality care for every client and real practical training for students.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Four Core Areas -->
        <section id="pillars" class="bg-pink-200/75 border-y border-pink-300 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-10">
                    <p class="text-xs font-bold uppercase tracking-widest text-rose-700">Our Specialties</p>
                    <h2 class="font-display text-3xl sm:text-4xl font-bold text-rose-950 mt-1">
                        What We Do at Uptown Beauty
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="rounded-2xl bg-pink-100 border border-pink-300 overflow-hidden">
                        <div class="h-40 bg-gradient-to-br from-pink-300 to-rose-300">
                            <img src="{{ asset('images/hair.jpg') }}" alt="All kinds of hair" class="w-full h-full object-cover" onerror="this.style.display='none'" />
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-bold uppercase text-rose-700">Hair</p>
                            <h3 class="font-display text-xl font-bold text-rose-950 mt-1">All Kinds of Hair</h3>
                            <p class="text-sm text-rose-900/80 mt-2">
                                Braids, weaves, wig installations, silk press, natural hair care, styling, and treatments for all hair types.
                            </p>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-pink-100 border border-pink-300 overflow-hidden">
                        <div class="h-40 bg-gradient-to-br from-rose-200 to-pink-400">
                            <img src="{{ asset('images/pedicure.jpg') }}" alt="Pedicure services" class="w-full h-full object-cover" onerror="this.style.display='none'" />
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-bold uppercase text-rose-700">Pedicures</p>
                            <h3 class="font-display text-xl font-bold text-rose-950 mt-1">Pedicure &amp; Foot Care</h3>
                            <p class="text-sm text-rose-900/80 mt-2">
                                Warm foot soaks, exfoliation, heel care, nail shaping, gel polish, and clean foot maintenance.
                            </p>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-pink-100 border border-pink-300 overflow-hidden">
                        <div class="h-40 bg-gradient-to-br from-pink-300 to-rose-200">
                            <img src="{{ asset('images/lashes.jpg') }}" alt="Eyelashes" class="w-full h-full object-cover" onerror="this.style.display='none'" />
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-bold uppercase text-rose-700">Eyelashes</p>
                            <h3 class="font-display text-xl font-bold text-rose-950 mt-1">Eyelash Extensions</h3>
                            <p class="text-sm text-rose-900/80 mt-2">
                                Classic, hybrid, and volume lashes, lash lifts, and tidy infills customized to suit your eyes.
                            </p>
                        </div>
                    </div>

                    <div id="training" class="rounded-2xl bg-pink-100 border border-pink-300 overflow-hidden">
                        <div class="h-40 bg-gradient-to-br from-rose-300 to-pink-300">
                            <img src="{{ asset('images/training.jpg') }}" alt="Student training" class="w-full h-full object-cover" onerror="this.style.display='none'" />
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-bold uppercase text-rose-700">Student Training</p>
                            <h3 class="font-display text-xl font-bold text-rose-950 mt-1">Train Students</h3>
                            <p class="text-sm text-rose-900/80 mt-2">
                                Hands-on classes teaching students hair making, pedicures, eyelash application, sanitation, and client care.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dynamic Services Section -->
        <section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-rose-700">Services &amp; Classes</p>
                    <h2 class="font-display text-3xl sm:text-4xl font-bold text-rose-950 mt-1">
                        Featured Offerings
                    </h2>
                </div>

                @if (isset($categories) && $categories->isNotEmpty())
                    <div class="flex flex-wrap gap-2" id="category-filters">
                        <button type="button" data-category="all" class="cat-btn rounded-full px-4 py-1.5 text-xs font-semibold bg-rose-700 text-white">
                            All
                        </button>
                        @foreach ($categories as $category)
                            <button type="button" data-category="{{ strtolower($category) }}" class="cat-btn rounded-full px-4 py-1.5 text-xs font-semibold bg-pink-200 text-rose-950 hover:bg-pink-300">
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            @if ($services->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($services as $service)
                        <article
                            data-cat="{{ strtolower($service->category) }}"
                            class="service-item rounded-2xl bg-pink-200/80 border border-pink-300 p-6 flex flex-col justify-between"
                        >
                            <div>
                                <div class="flex items-center justify-between text-xs font-semibold text-rose-700">
                                    <span class="uppercase tracking-wider">{{ $service->category }}</span>
                                    <span>{{ $service->duration_minutes }} mins</span>
                                </div>
                                <h3 class="font-display text-2xl font-bold text-rose-950 mt-2">
                                    <a href="{{ route('services.show', $service) }}" class="hover:text-rose-700 transition">
                                        {{ $service->name }}
                                    </a>
                                </h3>
                                @if ($service->description)
                                    <p class="text-sm text-rose-900/85 mt-2">{{ $service->description }}</p>
                                @endif
                            </div>

                            <div class="mt-5 pt-4 border-t border-pink-300 flex items-center justify-between">
                                <span class="font-bold text-rose-950">&#8358;{{ number_format($service->price, 2) }}</span>
                                <a href="{{ route('services.show', $service) }}" class="text-xs font-bold text-rose-800 hover:underline">
                                    View details &rarr;
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="rounded-2xl bg-pink-200/80 border border-pink-300 p-8 text-center">
                    <p class="font-semibold text-rose-950">No active services added yet.</p>
                    <p class="text-sm text-rose-900/80 mt-1">
                        Add your hair, pedicure, eyelash, and student training services to display them here.
                    </p>
                    <a href="{{ route('services.index') }}" class="mt-4 inline-flex rounded-xl bg-rose-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-rose-800 transition">
                        Go to Services
                    </a>
                </div>
            @endif
        </section>

        <!-- Hours -->
        <section id="hours" class="bg-pink-200/75 border-t border-pink-300 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-rose-700">Opening Hours</p>
                    <h2 class="font-display text-2xl font-bold text-rose-950 mt-1">Uptown Beauty Schedule</h2>
                    <p class="text-sm text-rose-900/85 mt-1">
                        Mon – Sat: 9:00 AM – 6:30 PM &bull; Student Training &amp; Appointments Available
                    </p>
                </div>
                <a href="{{ route('services.index') }}" class="rounded-xl bg-rose-700 px-5 py-3 text-sm font-semibold text-white hover:bg-rose-800 transition">
                    All Services
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-rose-900 text-pink-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm">
            <p class="font-display text-lg font-bold">Uptown Beauty &bull; &copy; {{ date('Y') }}</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <a href="{{ route('services.index') }}" class="hover:text-white transition">Services</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-white transition">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-white transition">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.cat-btn');
            const items = document.querySelectorAll('.service-item');

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const selected = btn.dataset.category;

                    buttons.forEach(b => {
                        b.className = 'cat-btn rounded-full px-4 py-1.5 text-xs font-semibold bg-pink-200 text-rose-950 hover:bg-pink-300';
                    });
                    btn.className = 'cat-btn rounded-full px-4 py-1.5 text-xs font-semibold bg-rose-700 text-white';

                    items.forEach(item => {
                        const cat = item.dataset.cat || '';
                        item.style.display = (selected === 'all' || cat === selected) ? 'flex' : 'none';
                    });
                });
            });
        });
    </script>
</body>
</html>