<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? "rtl" : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">

    <!-- Seo Tags -->
    <x-seo::meta/>
    <!-- Seo Tags -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=KoHo:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,600;1,700&display=swap" rel="stylesheet">

    @livewireStyles
    @filamentStyles
    @stack('styles')

    <link rel="stylesheet" href="{{ asset('vendor/zeus/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/zeus-artemis/css/daisy.css') }}">

    <style>
        * {font-family: 'KoHo', 'Almarai', sans-serif;}
        [x-cloak] {display: none !important;}
    </style>
</head>

@php $menu = \LaraZeus\Sky\SkyPlugin::get()->getModel('Navigation')::fromHandle(config('zeus.header_menu')) @endphp

<body class="@if(app()->isLocal()) debug-screens @endif antialiased">

<div class="container mx-auto py-4">
    @include($artemisTheme.'.layouts.navigation')
</div>

<div class="container mx-auto my-10 card card-compact w-full bg-base-200 shadow-lg">
    <div class="card-body">
        <div class="flex justify-between items-center">
            <div class="flex flex-col items-start">
                @if(isset($header))
                    <div class="italic font-semibold text-xl text-gray-600 dark:text-gray-100">
                        {{ $header }}
                    </div>
                @endif

                @if(isset($breadcrumbs))
                    <nav class="text-gray-400 font-bold my-2" aria-label="Breadcrumb">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="{{ route('blogs') }}">Home</a>
                                @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3')
                            </li>
                            {{ $breadcrumbs }}
                        </ol>
                    </nav>
                @endif
            </div>
            <div class="bolt-loading animate-pulse"></div>
        </div>
    </div>
</div>

<div class="container mx-auto">
    {{ $slot }}
</div>

<footer class="mt-10 footer items-center p-4 bg-base-200 text-base-content">
    <div class="items-center grid-flow-col">
        <img alt="Lara Zeus" loading="lazy" width="30" height="20" decoding="async" src="https://larazeus.com/images/zeus-logo.png">
        <a href="https://larazeus.com" target="_blank">
            a gift with ❤️ &nbsp;from @zeus
        </a>
    </div>
    <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-400 w-4 h-4 fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-400 w-4 h-4 fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>

@stack('scripts')
@livewireScripts
@filamentScripts
@livewire('notifications')
@livewire('livewire-ui-modal')

<script>
    const theme = localStorage.getItem('theme')

    if ((theme === 'dark') || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    }
</script>

</body>
</html>
