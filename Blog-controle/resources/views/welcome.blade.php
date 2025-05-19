<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- ... existing head content ... -->
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <!-- ... existing background image ... -->
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <!-- Logo section -->
                        <div class="flex lg:justify-center lg:col-start-2">
                            <!-- ... existing logo ... -->
                        </div>

                        <!-- User section -->
                        <div class="flex justify-end items-center gap-4">
                            @auth
                                <span class="text-black dark:text-white">
                                    Welcome, {{ Auth::user()->name }}
                                </span>
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>
                            @else
                                <!-- ... existing login/register links ... -->
                            @endauth
                        </div>
                    </header>

                    <!-- ... rest of the content ... -->
                </div>
            </div>
        </div>
    </body>
</html>