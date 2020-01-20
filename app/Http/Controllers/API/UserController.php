<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //

    public function register(Request $request){
//        $validate =$this->validate($request,[
//           'name'=>'required|min:3',
//           'tel'=>'digit'
//        ]);

        $user = new User();
        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->role_id = 1;
        $user->password = Hash::make( $request->password);
        $user->remember_token=Str::random(64);
        $user->save();

        if($user){
            return '1';
        }else{
            return '0';
        }

//        return  '2';
    }
    public function login(Request $request)
    {
        $user=User::where('tel',$request->tel)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return "hello";
            }
            else{
                return "bye";
            }
        }
    }
}
