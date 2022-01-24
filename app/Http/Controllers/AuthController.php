<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $userData = User::where('google_id', $user->id)->select('id','first_name','last_name', 'email', 'google_id', 'profile_img')->first();

            if($userData){
                Auth::login($userData);
                return redirect('/profile');
            }else{
                $name = explode(' ', $user->name);
                $newUser = User::create([
                    'first_name' => $name[0],
                    'last_name' => $name[1] ?? '',
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => bcrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect('/profile');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function signUp(Request $request)
    {
        $email = $request->emailId;
        //Check email exist
        $userExist = User::where('email', $email)->first();
        if($userExist) {
            echo json_encode(['status' => 'error', 'msg' => 'User already exist please signin']);
        } else {
            $newUser = User::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $email,
                'contact_no' =>$request->phoneNumber,
                'password' => Hash::make($request->password)
            ]);
            Auth::login($newUser);
            echo json_encode(['status' => 'success']);
        }
    }

    public function signIn(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        //Check email exist
        $userData = User::where('email', $email)->select('id','first_name','last_name', 'email', 'profile_img', 'password')->first();
        if($userData && Hash::check($password, $userData['password'])) {
            Auth::login($userData);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Invalid Email or Password']);
        }
    }

   	public function logout()
	{
		Session::flush();
	        
	    Auth::logout();

	    return redirect('/');
	}

}


