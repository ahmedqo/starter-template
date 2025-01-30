@extends('shared.auth.base')
@section('title', __('Forgot password'))

@section('content')
    <form validate action="{{ route('actions.blank.index') }}" method="POST"
        class="w-full flex flex-col gap-6 p-6 bg-x-white rounded-x-thin shadow-x-core">
        <p class="text-base text-x-black">
            {{ __('Forgot your password? No problem. Just tell us your email, and we will send you a link that will allow you to choose a new password') }}
        </p>
        @csrf
        <div class="flex flex-col gap-1">
            <label class="text-x-black font-x-thin text-base">
                {{ __('Email') }} (*)
            </label>
            <neo-textbox rules="required|email"
                errors='{"required": "{{ __('The email field is required') }}", "email": "{{ __('The email field must be a valid email') }}"}'
                type="email" placeholder="{{ __('Email') }} (*)" name="email" value="{{ old('email') }}"></neo-textbox>
        </div>
        <neo-button
            class="w-full text-base lg:text-lg font-x-huge text-x-white bg-x-prime hover:bg-x-acent focus:bg-x-acent focus-within:bg-x-acent">
            <span>{{ __('Send') }}</span>
        </neo-button>
    </form>
@endsection
