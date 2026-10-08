<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 min-h-screen flex flex-col justify-between">
    <!-- Navbar -->
    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <x-application-logo class="block h-9 w-auto fill-current text-indigo-600" />
                    <span class="font-bold text-xl text-gray-900 tracking-tight">Member Portal</span>
                </div>

                <nav class="flex items-center space-x-4">
                    <a href="{{ route('members.index') }}" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition">
                        Members
                    </a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition shadow-sm">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition shadow-sm">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100 mb-6">
                    Streamlined Member Management & Documents
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight">
                    Welcome to the <span class="text-indigo-600">Member Portal</span>
                </h1>
                <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                    A comprehensive platform to register members, manage profiles, securely upload and download PDF documents, and access administrator dashboards.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('members.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 shadow transition">
                        View Member Directory
                    </a>

                    @guest
                        <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition">
                            Register as Member
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition">
                            Go to Dashboard
                        </a>
                    @endguest
                </div>
            </div>

            <!-- Feature Cards Grid -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-6 rounded-xl border border-gray-200/80 shadow-sm hover:shadow transition">
                    <div class="w-12 h-12 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Member Directory</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Access all registered members with their contact info, email addresses, and registration dates.
                    </p>
                    <a href="{{ route('members.index') }}" class="mt-4 inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-700">
                        Explore Directory &rarr;
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200/80 shadow-sm hover:shadow transition">
                    <div class="w-12 h-12 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">PDF Document Vault</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Upload documents directly to your profile. All files are securely kept and easily downloadable.
                    </p>
                    <a href="{{ route('login') }}" class="mt-4 inline-flex items-center text-sm font-semibold text-emerald-600 hover:text-emerald-700">
                        Upload Documents &rarr;
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200/80 shadow-sm hover:shadow transition">
                    <div class="w-12 h-12 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Admin Dashboard</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Administrators can review all member accounts and inspect and download their uploaded documents.
                    </p>
                    <a href="{{ route('login') }}" class="mt-4 inline-flex items-center text-sm font-semibold text-amber-600 hover:text-amber-700">
                        Admin Login &rarr;
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-6 text-center text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} Member Portal. All rights reserved.</p>
    </footer>
</body>
</html>