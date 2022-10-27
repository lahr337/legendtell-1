<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Socialite;

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
  // protected $redirectTo = RouteServiceProvider::HOME;
  public function redirectTo()
  {
    
    $role = Auth::user()->role;
    switch ($role) {
      case '1':

        return '/admin-settings/editProfile';
        break;
      case '2':
        if (Auth::user()->shop_name == null || Auth::user()->shop_name == '') {
          return '/shop-settings/editProfile';
        } else {
          return '/shop-settings/mydashboard';
        }


        break;
      case '3':
        $session_value = Session::get('vin_url');
        if (empty($session_value)) {
          return '/account-settings/editProfile';
        } else {
          Session::forget('vin_url');
          return $session_value;
        }
        break;
      default:
        return '/';
        break;
    }
  }
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function loginOrSignup(Request $request, $type = 'login')
  {
    $page_title = $type == 'login' ? 'Login' : 'Signup';
    $is_admin = 'No';
    if ($type == 'register') {
      return view('auth.register', compact('page_title', 'type'));
    } else {
      return view('auth.login', compact('page_title', 'type','is_admin'));
    }
  }

  /**
   * Show the application's login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showLoginForm()
  {
    return redirect()->route('auth.login-or-signup', ['login']);
  }

  public function storeSession(Request $request)
  {
    Session::put(['vin_url' => $request->url_vin]);
    return true;
  }

  public function admin_login(Request $request, $type = 'login')
    {
        $page_title = 'Login';
        $is_admin ="Yes";
        if(!empty($request->email) && !empty($request->password))
        {

          $rules = array(
            'email' => 'required',
            'password' => 'required',
          );
      
          $messages = [
            'email.required'     =>  'Email is required for login',
            'password.required'  =>  'Password is required for login',
          ];
      
          $validator = Validator::make($request->all(), $rules, $messages);
          if ($validator->fails()) {
            return Redirect::to('/user/login')
              ->withInput()
              ->withErrors($validator->$messages);
          } else {
            $userdata = array(
              'email' => $request->email,
              'password' => $request->password,
            );
          }
      
          if (Auth::attempt($userdata)) {
              if (Auth::user()->role == 1) {
                return Redirect::to('/admin-settings/editProfile');
              } else {
                Auth::logout();
                return Redirect::to('/admin/login')->with('error', 'Oops, You are not Authorized.');
              }
          } else {
            return Redirect::to('/admin/login')->with('error', 'Invalid Login Credentials.');
          }


        }

        return view('admin-settings.login', compact('page_title', 'type','is_admin'));

    }


}
