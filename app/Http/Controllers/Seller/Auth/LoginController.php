<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }


    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        
             if (Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password])) {
                $notification=['alert'=>'success','message'=>'Successfully Added','status'=>200,'route'=>route("seller.dashboard")];
                return json_encode($notification);
            }else{
                $notification=['alert'=>'error','message'=>'Credentials not match','status'=>400,'route'=>'seller.login'];
                 return json_encode($notification);
            }    
    }


     public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        session()->flash('success_message','successfully loged out...');
        return redirect()->route('seller.login');
    }

    protected function guard()
    {
        return Auth::guard('seller');
    }
}
