<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use DB;
use Session;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function authenticate(Request $request){

        $this->validate($request,[
            'email'=>'required|email|',
            'password'=>'required|min:6',
           
            
        
        ]);

        $users=DB::table('users')->where([
            ['email','=',$request->email]
        ])->get();
        // dd($users[0]);
        if(count($users) >= 1){
            
                if($users[0]['active'] == true){

        Auth::attempt(['email'=>$request->email, 'password'=>$request->password,'active'=>true],$request->remember) ;
            // Authentication passed...
Session::put('id',$users[0]['_id'] );
// $_SESSION["id"]  = $users[0]['_id'] ;
// dd($_SESSION["id"]);
            return redirect()->intended('/home');
        }
else{
//    echo "Your Account is Inactive";
$message='The User is Inactive';
return redirect()->back()->withInput($request->only('email','remember'))->withErrors([
    
    $this->username() => $message,
]);

}
    }

    else {
        // echo "The User does not Exists";
      
        $message1='The User Does Not Exists !';
        return redirect()->back()->withInput($request->only('email','remember'))->withErrors([
            
            $this->username() => $message1,
        ]);
        

    }

}
}