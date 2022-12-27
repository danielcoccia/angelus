@extends('layouts.auth-master')

@section('title')

@section('content')
 <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oloco, meu!</strong> Olha esse alerta animado, como é chique!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="/" class="logo logo-admin"><img src="{{ URL::asset('/images/logo150px.png')}}" height="70" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Segurança!</h4>
                                <p class="text-muted text-center">Recuperar Senha</p>

                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p>{{$errors->first()}}</p>
                        </div>
                    @endif

                                <form class="form-horizontal mt-4" method="post" action="/email/remessa-email">
                                       @csrf
                                    <div class="form-group">
                                        <label for="username">E-Mail</label>
                                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus placeholder="Digite o email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                     <div class="mt-4">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="register" type="submit"> {{ __('Enviar Link para recuperar senha') }}</button>
                                    </div>
                                    {{--<div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>--}}
                                   </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                       {{-- <p>Don't have an account ? <a href="/register" class="text-primary"> Signup Now </a></p>--}}
                        <p>© {{  date('Y', strtotime('-2 year')) }} - {{  date('Y') }} Propriedade da Comunhão Espírita de Brasília <i class="mdi mdi-heart text-danger"></i> Todos os direitos reservados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('footerScript')
            <!-- Required datatable js -->
           <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>

@endsection
