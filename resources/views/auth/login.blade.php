@extends('layouts.app')

@section('head')
<style>
    /* Heartstopper-themed styling */
    .container {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        background: linear-gradient(135deg, #d0e0f0, #e0f7fa);
        /* Light gradient background */
        padding: 30px;
        border-radius: 15px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: linear-gradient(135deg, #a2c2e9, #b9e0ff);
        /* Bubble gum blue gradient for the header */
        color: white;
        font-weight: bold;
        border-radius: 15px 15px 0 0;
        padding: 15px;
        text-align: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, #5a9bd4, #82b3e0);
        /* Gradient background for primary buttons */
        border: none;
        color: white;
        font-weight: bold;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4a8ac3, #699fcf);
    }

    .btn-link {
        color: #5a9bd4;
    }

    .btn-link:hover {
        color: #4a8ac3;
    }

    .form-control {
        border-radius: 10px;
    }

    .form-check-label {
        color: #333;
        font-weight: bold;
    }

    .invalid-feedback {
        color: #ff5c5c;
        font-weight: bold;
    }

    .col-form-label {
        color: #333;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection