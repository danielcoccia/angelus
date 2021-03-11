@extends('layouts.auth-master')

@section('title', 'Email Confirmation')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-dark.png')}}" height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Security !</h4>
                                <p class="text-muted text-center">Reset Password</p>

                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                                <form class="form-horizontal mt-4" method="POST" action="{{ route('password.email') }}">
                                       @csrf
                                    <div class="form-group">
                                        <label for="username">E-Mail Address</label>
                                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                     <div class="mt-4">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit"> {{ __('Send Password Reset Link') }}</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                   </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="/register" class="text-primary"> Signup Now </a></p>
                        <p>© {{  date('Y', strtotime('-2 year')) }} - {{  date('Y') }} Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
