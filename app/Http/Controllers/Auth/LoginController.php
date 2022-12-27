<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     //Funcao que requisita username ou email do usuario
     public function username()
     {
         $cpf  = request()->get('cpf');
         $input = filter_var($cpf, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
         request()->merge([$input => $cpf]);

         return $input;
     }

     //Validacao do formulario
     protected function validateLogin(Request $request)
     {
         $this->validate(
         $request,
         [
             'cpf' => 'required|string',
             'hash_senha' => 'required|string',
         ]
         );
     }


  //Funcao de erro
      function sendFailedLoginResponse(Request $request)
          {
              $request->session()->put('login_error', trans('auth.failed'));
              throw ValidationException::withMessages(
                  [
                      'error' => [trans('auth.failed')],
                  ]
              );
           }



}
