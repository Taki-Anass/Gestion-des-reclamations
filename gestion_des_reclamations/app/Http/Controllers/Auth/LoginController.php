<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreadminRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:prestataire')->except('logout');
    }
    //admin login form
    public function adminLoginForm()
    {
        return view('auth.adminLogin');
    }
    //admin login check
    public function loginAdmin(StoreadminRequest $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/home');
        }
        return back()->withInput($request->only('email', 'remember'));
       
    }

      //prestataire login form
      public function prestataireLoginForm()
      {
          return view('auth.prestataireLogin');
      }
      //prestataire login check
      public function loginPrestataire(StoreadminRequest $request)
      {
          $this->validate($request, [
              'email'   => 'required|email',
              'password' => 'required|min:6'
          ]);
  
          if (Auth::guard('prestataire')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
  
              return redirect()->intended('/prestataire/home');
          }
          return back()->withInput($request->only('email', 'remember'));
         
      }
}
