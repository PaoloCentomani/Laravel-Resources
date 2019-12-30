@extends('layouts.app')

@section('title', __('Contact Us'))

@section('content')
<div class="container mx-auto">
    <h1 class="mt-0 mb-4">
        @yield('title')
    </h1>

    {{-- Form --}}
    <form method="POST" action="{{ route('support.store') }}">
        @csrf
        @honeypot

        <div class="card">
            <div class="card-body">
                {{-- Full Name --}}
                <div class="form-group required">
                    <label for="name">{{ __('messages.support.fields.name') }}</label>

                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?: optional($user)->fullName }}" required autocomplete="name">

                    @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- E-Mail Address --}}
                <div class="form-group required">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?: optional($user)->email }}" required autocomplete="email">

                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="form-group required">
                    <label for="message">{{ __('messages.support.fields.message') }}</label>

                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5">{{ old('message') }}</textarea>

                    @error('message')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {{-- Buttons --}}
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.support.buttons.send_message') }}
                    </button>

                    <a href="{{ route('home') }}" class="btn-link">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
