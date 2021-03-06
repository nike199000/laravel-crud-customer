<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/customers';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
   //  public function loginSubmit(Request $request)
   // {
   //
   //      $email=$request->email;
   //      $password=$request->password;
   //
   //      //var_dump($credentials);die;
   //     if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
   //         // Authentication passed...
   //
   //          return view('dashboard');
   //     }
   //     else
   //     {
   //          return view('auth/login');
   //     }
   // }

   public function logout(Request $request)
   {
       $this->guard()->logout();
       $request->session()->invalidate();
       return $this->loggedOut($request) ?: redirect('/customers');
   }

}
