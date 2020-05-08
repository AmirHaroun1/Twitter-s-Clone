<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="header">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto flex justify-between">
                <h1>
                    <a href="/home"><img HEIGHT="40" WIDTH="80" src="{{asset('images/logo.png')}}" alt="tweety" ></a>
                </h1>
                @auth
                    <a class="text-blue-500 text-lg pr-16 pt-5" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </header>
        </section>
        <section class=" px-8">
                <main class="container mx-auto">
                    <div class="lg:flex justify-between">
                            @if(auth()->check())

                            <div class="w-auto">
                                @include('_sidebar-links')
                            </div>

                        @endif

                        <div class="flex-1 lg:mx-10 " style="max-width: 700px">

                            @yield('content')



                        </div>
                            @if(auth()->check())

                                        @include('_friends_list')
                            @endif

                    </div>
                </main>
        </section>
    </div>
</body>
<script href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</html>
