<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.feeds');
    }

    public function dashboard(){
        echo "Welcome Home";
        return view('feeds');
    }

    public function upload_image(){
        return view('user_profile.image_upload');
    }

    public function user_settings(Request $request){

        $password = \Auth::user()->password;

        if( !empty($request->get('password')) && !empty($request->get('confirmpassword')) ){
            $new_password_validator = Validator::make($request->all(), [
                'confirmpassword' => 'same:password',
                'password' => 'same:confirmpassword',
            ]);

            if($new_password_validator->fails()){
                return redirect()->back()->withErrors($new_password_validator);
            }
        }

        if( !empty($request->get('old_password')) ){

            $old_password_validator = Validator::make($request->all(), [
                'old_password' => 'same:'.$password,
            ]);

            if ($old_password_validator->fails()) {
                return redirect()->back()->withErrors(["old_password", "Password incorrect!"]);
            }else{
                echo "Situation Under Control!";
                die();
            }
        }

    }
}
