@extends('layout.main')
@section('content_header')
    <h1>Form Register</h1>
    {{-- <a href="/obat">balik</a> --}}
@stop

@section('content')

@if ($errors->any())

<div>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif @if ($errors->any())

<div>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

            <div class="card offset-md-2 col-md-8" >
                

                <div class="card-body ">
                    <form method="POST" action="{{ route('obat.login') }}" class="gap-form m4">
                        @csrf
                    
                        <div class=" offset-md-1">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" offset-md-1">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>

                        <div class="">
                            <div class="col-md-6 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button><hr>
                                <a href="register">Belum Punya Akun? Bikin Dulu </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@stop