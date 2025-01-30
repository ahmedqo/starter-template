@extends('shared.auth.base')
@section('title', __('Login'))

@section('content')
    <form validate action="{{ route('actions.login.index') }}" method="POST"
        class="w-full flex flex-col gap-6 p-6 bg-x-white rounded-x-thin shadow-x-core">
        @csrf
        <div class="flex flex-col gap-1">
            <label class="text-x-black font-x-thin text-base">
                {{ __('Email') }} (*)
            </label>
            <neo-textbox rules="required|email"
                errors='{"required": "{{ __('The email field is required') }}", "email": "{{ __('The email field must be a valid email') }}"}'
                type="email" placeholder="{{ __('Email') }} (*)" name="email" value="{{ old('email') }}"></neo-textbox>
        </div>
        <div class="flex flex-col gap-1">
            <label class="text-x-black font-x-thin text-base">
                {{ __('Password') }} (*)
            </label>
            <neo-password rules="required" errors='{"required": "{{ __('The password field is required') }}"}'
                placeholder="{{ __('Password') }} (*)" name="password" value="{{ old('password') }}"></neo-password>
        </div>
        <neo-button
            class="w-full text-base lg:text-lg font-x-huge text-x-white bg-x-prime hover:bg-x-acent focus:bg-x-acent focus-within:bg-x-acent">
            <span>{{ __('Login') }}</span>
        </neo-button>
        <a href="{{ route('views.blank.index') }}" aria-label="forgot_page_link"
            class="block -mt-2 w-max mx-auto outline-none text-x-acent font-x-huge text-sm hover:text-x-prime focus:text-x-prime focus-within:text-x-prime">
            {{ __('Forgot your password?') }}
        </a>
    </form>
@endsection
