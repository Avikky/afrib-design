<?php

namespace App\Http\Controllers\myAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //this loginUser function accepts parameter from the route
    public function loginUser(Request $request, $username)
    {
        // acces the link parameters and check if the user exist in the the db
        $user = User::where('username', $username)->first();
        if($user){
            $request['email'] = $user->email;
            $request['uu_id'] = $user->email;
            //here user exist login the user
            Auth::login($user);

            //start session

            $request->session()->regenerate();
            
            //take user to the dashboard 
            return view('account.dashboard');
        }else{
           $response = 'cannot identity user please clikc below to register <br><br> <a href='
           .route('register').'>Register here</a>';

           return $response;
        }
        
    }

}
