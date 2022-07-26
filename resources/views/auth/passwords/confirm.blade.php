@extends('layouts.auth-master')

@section('title', 'Confirm')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-dark.png')}}"  height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Security !</h4>
                                <p class="text-muted text-center">Confirm Password</p>
                                <form class="form-horizontal mt-4" method="POST" action="{{ route('password.confirm') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="useremail">Password</label>
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-0 row">
                                       <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit">{{ __('Confirm Password') }}</button>
                                        @if (Route::has('password.request'))
                                        <br>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="/login" class="text-primary"> Login </a> </p>
                        <p>© {{  date('Y', strtotime('-2 year')) }} - {{  date('Y') }} Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
