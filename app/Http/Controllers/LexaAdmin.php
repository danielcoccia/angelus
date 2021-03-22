<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LexaAdmin extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index($folderName, $fileName)
    {
        // Render perticular view file by foldername and filename
        if (view()->exists($folderName . "." . $fileName)) {
            return view($folderName . "." . $fileName);
        }
        return abort(404);
    }

    public function root()
    {
        // Render perticular view file by foldername and filename
        return view('dashboard.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function live()
    {
        return "";
    }
}
