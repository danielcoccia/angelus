@extends('layouts.master')

@section('title') Alterar senha @endsection

@section('content')

 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center" style="color:#f90505 !important; font-weight: bold;">ALTERAR SENHA</h4>
                                <!-- <p class="text-muted text-center">Sign in to continue to Lexa.</p> -->
                                <form method="POST" class="form-horizontal mt-4" action="/usuario/gravaSenha">
                                       @csrf
                                    <div class="form-group">
                                        Usuário - {{session()->get('usuario.nome')}}
                                    </div>

                                    @if(session('mensagem'))
                                        <div class="alert alert-success">
                                            <p>{{session('mensagem')}}</p>
                                        </div>
                                    @endif

                                    @if(session('mensagemErro'))
                                        <div class="alert alert-danger">
                                            <p>{{session('mensagemErro')}}</p>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="senhaAtual">Senha Atual</label>
                                        <input id="senhaAtual" type="password" class="form-control @error('password') is-invalid @enderror" name="senhaAtual" required autocomplete="current-password" placeholder="">
                                        @error('msg_erro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>

                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="senhaNova">Senha Nova</label>
                                        <input id="senhaNova" type="password" class="form-control @error('password') is-invalid @enderror" name="senhaNova" required autocomplete="current-password" placeholder="">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-6">
                                            <!-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customControlInline">{{ __('Remember Me') }}</label>
                                            </div> -->
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-success w-md waves-effect waves-light" type="submit">Confirmar</button>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
