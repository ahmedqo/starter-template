@extends('shared.auth.base')
@section('title', __('Reset password'))

@section('content')
    <div class="w-full flex justify-center items-center p-4 mx-auto lg:w-1/2">
        <div class="w-full lg:w-2/3 flex flex-col gap-4">
            <a href="{{ route('views.login.index') }}" class="block w-36 mx-auto" aria-label="login_page_link">
                <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt="{{ env('APP_NAME') }} logo image"
                    class="block w-full" width="916" height="516" loading="lazy" />
            </a>
            <form validate action="{{ route('actions.reset.index', $token) }}" method="POST"
                class="w-full flex flex-col gap-6 p-6 bg-x-white rounded-x-thin shadow-x-core">
                @csrf
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('New password') }} (*)
                    </label>
                    <neo-password rules="required" errors='{"required": "{{ __('The new password field is required') }}"}'
                        placeholder="{{ __('New password') }} (*)" name="new_password"></neo-password>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Confirm password') }} (*)
                    </label>
                    <neo-password rules="required|match:new_password"
                        errors='{"required": "{{ __('The confirm password field is required') }}", "match": "{{ __('The confirm password field must match the new password field') }}"}'
                        placeholder="{{ __('Confirm password') }} (*)" name="confirm_password"></neo-password>
                </div>
                <neo-button
                    class="w-full text-base lg:text-lg font-x-huge text-x-white bg-x-prime hover:bg-x-acent focus:bg-x-acent focus-within:bg-x-acent">
                    <span>{{ __('Reset') }}</span>
                </neo-button>
            </form>
        </div>
    </div>
@endsection
