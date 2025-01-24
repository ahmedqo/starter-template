@extends('shared.core.base')
@section('title', __('New user'))

@section('content')
    <form validate action="{{ route('actions.users.store') }}" method="POST" class="w-full">
        @csrf
        <neo-stepper step="step-1" class="w-full flex flex-col gap-6">
            <neo-stepper-item step="step-1" class="grid grid-cols-1 grid-rows-1 gap-6">
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('First name') }} (*)
                    </label>
                    <neo-textbox rules="required" errors='{"required": "{{ __('The first name field is required') }}"}'
                        placeholder="{{ __('First name') }} (*)" name="first_name"
                        value="{{ old('first_name') }}"></neo-textbox>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Last name') }} (*)
                    </label>
                    <neo-textbox rules="required" errors='{"required": "{{ __('The last name field is required') }}"}'
                        placeholder="{{ __('Last name') }} (*)" name="last_name"
                        value="{{ old('last_name') }}"></neo-textbox>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Email') }} (*)
                    </label>
                    <neo-textbox rules="required|email"
                        errors='{"required": "{{ __('The email field is required') }}", "email": "{{ __('The email field must be a valid email') }}"}'
                        type="email" placeholder="{{ __('Email') }} (*)" name="email"
                        value="{{ old('email') }}"></neo-textbox>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Phone') }} (*)
                    </label>
                    <neo-textbox rules="required|phone"
                        errors='{"required": "{{ __('The phone field is required') }}", "phone": "{{ __('The phone field must be a valid phone number') }}"}'
                        type="tel" placeholder="{{ __('Phone') }} (*)" name="phone"
                        value="{{ old('phone') }}"></neo-textbox>
                </div>
            </neo-stepper-item>
            <neo-stepper-item step="step-2" class="grid grid-cols-1 grid-rows-1 gap-6">
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Gender') }}
                    </label>
                    <neo-select placeholder="{{ __('Gender') }}" name="gender">
                        @foreach (Neo::genderList() as $gender)
                            <neo-select-item value="{{ $gender }}" {{ $gender == old('gender') ? 'active' : '' }}>
                                {{ ucfirst(__($gender)) }}
                            </neo-select-item>
                        @endforeach
                    </neo-select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Birth date') }}
                    </label>
                    <neo-datepicker {{ !Neo::locale('ar') ? 'full-day=3' : '' }} placeholder="{{ __('Birth date') }}"
                        name="birth_date" format="{{ Neo::formatsList(Neo::preference('date_format'), 0) }}"
                        value="{{ old('birth_date') }}"></neo-datepicker>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-x-black font-x-thin text-base">
                        {{ __('Address') }}
                    </label>
                    <neo-textarea placeholder="{{ __('Address') }}" name="address" value="{{ old('address') }}"
                        rows="4"></neo-textarea>
                </div>
            </neo-stepper-item>
            <div slot="bottom" class="w-full flex flex-wrap gap-6">
                <neo-button outline type="button" id="prev" style="display: none"
                    class="w-max me-auto outline outline-1 -outline-offset-1 outline-x-prime px-6 text-base lg:text-lg font-x-huge text-x-prime hover:outline-x-acent hover:text-x-white hover:bg-x-acent focus:outline-x-acent focus:text-x-white focus:bg-x-acent focus-within:outline-x-acent focus-within:text-x-white focus-within:bg-x-acent">
                    <span>{{ __('Prev') }}</span>
                </neo-button>
                <neo-button id="save" style="display: none"
                    class="w-max px-6 ms-auto text-base lg:text-lg font-x-huge text-x-white bg-x-prime hover:bg-x-acent focus:bg-x-acent focus-within:bg-x-acent">
                    <span>{{ __('Save') }}</span>
                </neo-button>
                <neo-button outline type="button" id="next"
                    class="w-max ms-auto outline outline-1 -outline-offset-1 outline-x-prime px-6 text-base lg:text-lg font-x-huge text-x-prime hover:outline-x-acent hover:text-x-white hover:bg-x-acent focus:outline-x-acent focus:text-x-white focus:bg-x-acent focus-within:outline-x-acent focus-within:text-x-white focus-within:bg-x-acent">
                    <span>{{ __('Next') }}</span>
                </neo-button>
            </div>
        </neo-stepper>
    </form>
@endsection
