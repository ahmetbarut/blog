@extends('layouts.app')

@section('content')
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
            <div class="login-content row">
                <div class="login-form col-6 mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                            <label>E-Posta Adresi</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Posta">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label>Parola</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"" placeholder="Parola">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Beni Hatırla
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{ __('Giriş Yap') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection