@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-title text-center">
                    <h4 class="mt-2">
                        <i class="fa fa-lock"></i>
                        {{ __('custom.title-login') }}
                    </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('custom.email') }}</label>
                           
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('custom.password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            
                            <button type="submit" class="btn btn-custom btn-block mb-1">
                                {{ __('custom.btn-login') }}
                                <i class="fa fa-arrow-right"></i>
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('custom.password-request') }}
                                </a>
                            @endif      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
