<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Neo::locale('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('shared.base.styles')
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body close class="bg-x-light bg-x-gradient">
    <section id="neo-page-cover">
        <img src="{{ Neo::logo() }}" alt="{{ env('APP_NAME') }} logo image" class="block w-36" width="916"
            height="516" loading="lazy" />
    </section>
    <neo-wrapper class="isolate">
        <neo-topbar transparent align="end" class="fixed top-0 left-0 right-0 w-full pointer-events-none z-[1]">
            <neo-dropdown label="{{ __('Languages') }}" class="pointer-events-auto">
                <button slot="trigger" aria-label="language_trigger" class="flex gap-4 items-center">
                    <span>{{ ucfirst(__(Neo::languagesList()[Neo::locale()])) }}</span>
                    <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M480.84-28q-92.73 0-175.23-35.47-82.51-35.48-144.06-97Q100-222 64.5-304.74 29-387.48 29-480.24t35.47-175.21q35.48-82.45 97-144Q223-861 305.74-896.5q82.74-35.5 175.5-35.5t175.38 35.37q82.62 35.37 143.58 97.17 60.96 61.81 96.38 144.37Q932-572.52 932-479.76q0 92.76-35.29 175.21t-96.5 144Q739-99 656.1-63.5 573.21-28 480.84-28ZM441-166v-79q-32 0-55.44-23.23-23.43-23.23-23.43-55.85v-38.54L173-552q-3 17.47-5.5 34.95-2.5 17.47-2.5 35.39 0 120.33 78.5 211.49Q322-179 441-166Zm273-101q41-44 61.5-99.92T796-482q0-97.71-53-177.35Q690-739 600-773v14.33q0 32.43-23.76 55.55Q552.47-680 519.34-680H441v79.7q0 16.3-11.5 27.8T400.7-561H321v79h238.6q15.98 0 28.19 11.5T600-442.74V-323h38.21Q665-323 686-307.45q21 15.56 28 40.45Z" />
                    </svg>
                </button>
                <ul class="w-full flex flex-col">
                    @foreach (Neo::languagesList() as $lang => $language)
                        <li class="w-full">
                            <a href="{{ route('actions.language.index', $lang) }}"
                                class="w-full flex flex-wrap gap-2 px-4 py-2 items-center outline-none hover:text-x-white hover:bg-x-acent focus:text-x-white focus:bg-x-acent focus-within:text-x-white focus-within:bg-x-acent {{ Neo::locale($lang) ? 'bg-x-prime text-x-white' : 'text-x-black' }}">
                                <img src="{{ Neo::asset('lang/' . $lang . '.png') }}"
                                    alt=" {{ ucfirst(__($language)) }} flag" loading="lazy"
                                    class="block w-6 h-4 object-contain" />
                                <span class="block flex-1 text-base text-start"> {{ ucfirst(__($language)) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </neo-dropdown>
        </neo-topbar>
        <main class="flex flex-wrap h-[100dvh]">
            <div class="w-full flex justify-center items-center p-4 mx-auto lg:w-1/2">
                <div class="w-full lg:w-2/3 flex flex-col gap-4">
                    <a href="{{ route('views.login.index') }}" class="block w-36 mx-auto" aria-label="login_page_link">
                        <img src="{{ Neo::logo() }}" alt="{{ env('APP_NAME') }} logo image" class="block w-full"
                            width="916" height="516" loading="lazy" />
                    </a>
                    @yield('content')
                </div>
            </div>
        </main>
    </neo-wrapper>
    <neo-toaster horisontal="end" vertical="start"></neo-toaster>
    @include('shared.base.scripts', ['type' => 'admin'])
    @yield('scripts')
</body>

</html>
