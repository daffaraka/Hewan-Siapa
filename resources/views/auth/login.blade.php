@extends('frontend.layout-front-end')

@section('judul','Login')
@include('frontend.partials-front-end.header-front-end')

@section('content')
<div class="container fluid" style="font-family: Montserrat ">
    <div class="row justify-content-center shadow rounded">
        <div class="col-md-7 m-0">
            <div class="row">
                <div class="col-sm-5">
                    <div class="mt-2 text-justify text-center bg-dark text-light rounded shadow">
                            <h3 class="font-weight-bold m-0">Adopt</h3>
                            <h3 class="m-0">don't shop </h3>
                    </div>
                    <h4 class="text-justify text-center text-dark mt-1 mb-1">
                        Temukan calon peliharaan anda dengan cepat dan tepat hanya di</h4>
                    <h1 class="bg-dark text-justify text-center rounded shadow"><label class="badge badge-dark">Hewan Siapa</label></h1>
                </div>
                <div class="col-sm-7">
                    <img src="{{asset('assets/img/adopt/photo1.png')}}" class="w-100 mt-4" alt="" class="login-image">
                </div>
            </div>
            
        </div>
        <div class="col-md-5 p-0">
            <div class="card h-100">
                <div class="card-header" style="font-size: 20px; font-weight:700;"> Login</div>

                <div class="card-body bg-dark text-light" style="height: 100%;">
                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pl-0" href="{{ route('password.request') }}">
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
