<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Registrasi Pendakian') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 w-auto">
                            </a>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('mountains.index') }}" class="text-sm text-gray-700 underline">
                                Mountains
                            </a>
                            <a href="{{ route('schedules.index') }}" class="text-sm text-gray-700 underline">
                                Schedules
                            </a>
                            <a href="{{ route('registrations.index') }}" class="text-sm text-gray-700 underline">
                                Registrations
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center">
                        @auth('admin')
                            <span class="mr-4">Hello, {{ Auth::guard('admin')->user()->name }}</span>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-gray-700 underline">Logout</button>
                            </form>
                        @elseif(Auth::check())
                            <span class="mr-4">Hello, {{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-gray-700 underline">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>