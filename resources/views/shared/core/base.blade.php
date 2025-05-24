<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Neo::locale('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('meta')
    @include('shared.base.styles')
    @yield('styles')
    <title>@yield('title')</title>
    @if (Neo::preference())
        @php
            \Carbon\Carbon::setLocale(Neo::preference('language'));
        @endphp
        <meta name="core"
            content="{{ json_encode([
                'format' => Neo::formatsList(Neo::preference('date_format'), 0),
                'currency' => Neo::preference('currency'),
            ]) }}">
        <style>
            {{ Neo::colors() }}
        </style>
    @endif
</head>

<body close class="bg-x-light bg-x-gradient">
    <section id="neo-page-cover">
        <img src="{{ Neo::logo() }}" alt="{{ env('APP_NAME') }} logo image" class="block w-36" width="916"
            height="516" />
    </section>
    <neo-wrapper class="flex flex-wrap">
        @include('shared.core.sidebar')
        <main class="w-full lg:w-0 lg:flex-1 h-[100dvh] overflow-auto flex flex-col gap-8 pb-8">
            @include('shared.core.topbar')
            <div class="px-4 container mx-auto lg:max-w-[1200px]">
                @yield('content')
            </div>
        </main>
    </neo-wrapper>
    <neo-toaster horisontal="end" vertical="start" class="full-size"></neo-toaster>
    @include('shared.base.scripts', ['type' => 'admin'])
    @yield('scripts')
</body>

</html>
