<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserInvitation\CheckRequest;

class InvitationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * index
     *
     */
    protected function index($token = '')
    {
        $user = User::where('verify_token', $token)->first();

        if($user) {        
            $page_title = 'Invitation';
            $page_description = 'Invitation page';
    
            return view('auth.invitation', compact('page_title', 'page_description', 'user'));
        }

        return view('error');
    }


    /**
     * check
     *
     */
    protected function check(CheckRequest $request)
    {

        $user = User::where('verify_token', $request->verify_token)->first();

        if($user) {        
            $user->password = Hash::make($request->password);
            $user->username = $request->username;
            $user->email_verified_at = now();
            $user->status = 'active';
            $user->save();
            return redirect('/');
        }

        return view('error');
    }
}
