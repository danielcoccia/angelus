=@extends('layouts.auth-master')

@section('title', 'Register')

@section('content')
      <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/dashboard/index" class="logo logo-admin"><img src="{{ URL::asset('/images/logo-dark.png')}}"  height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Free Register</h4>
                                <p class="text-muted text-center">Get your free Lexa account now.</p>
                                <form class="form-horizontal mt-4" action="/">

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <p class="text-muted mb-0 font-size-14">By registering you agree to the Lexa <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="/pages/pages-login" class="text-primary"> Login </a> </p>
                        <p>© {{  date('Y', strtotime('-2 year')) }} - {{  date('Y') }} Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
