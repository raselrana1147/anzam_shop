<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Seller\Seller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{
  

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('seller.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


   public function register(Request $request)
   {

       
      $this->validate($request, [
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:sellers',
           'phone' => 'required|string|unique:sellers',
           'password' => 'required|string|min:4',
       ]);

      if ($request->isMethod("POST")) {
               DB::beginTransaction();
          try {
               $seller=new Seller();
               $seller->name=$request->name;
               $seller->email=$request->email;
               $seller->phone=$request->phone;
               $seller->password=Hash::make($request->password);
               $seller->save();
               DB::commit();
               $notification=['status'=>'200', 'type'=>'success','message'=>'Successfully registration','route'=>route('seller.login')];
               
          } catch (QueryException $e) {
               DB::rollBack();
               $e=$e->getMessage();
               $notification=['status'=>'422', 'type'=>'error','message'=>$e];
          }
      }
       echo json_encode($notification);


   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
