<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login() {
        
        if ( $this->attemptLogin(request()) ) {
            $user = $this->guard()->user();
            if( Auth::attempt(['email' => request()->email, 'password' => request()->password]) ) {

                if ( $user->hasRoles(['Admin', 'Supplier']) ) {

                    request()->session()->flash('success', 'You are now logged in.');
                    return redirect()->intended('admin');
    
                }else{
                    request()->session()->flash('success', 'You are now logged in.');
                    return redirect()->intended('/');
                } 
                
            }
            
        }else{
            
            request()->session()->flash('error', 'Wrong credentials.');
            return redirect()->back()->withInput();
        }
    }
}