<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\student\CreateRequest;
use App\Http\Requests\API\student\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function store(CreateRequest $request)
    {
        try {


            $user = new User();
            $user->tel = $request->tel;
            $user->role_id = 2;
            $user->password = Hash::make($request->password);
            $user->username = $request->tel;
            $user->remember_token = Str::random(64);
            $user->code = substr($request->tel, -4);
            $user->save();

            return response()->json([
                'data' => [
                    'tel' => $user->tel,
                    'role_id' => $user->role_id,
                    'user_id' => $user->id,
                ],
                'status' => '200',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => '500',
                'message' => 'خطایی در سرور رخ داده است لطفا مجددا اقدام نمایید'
            ]);

        }


//        return response()->json([
//            'data'=>[
//                'name'=>$user->name,
//                'password'=>$user->password
//            ],
//            'status'=>'0',
//            'message'=>'کاربر با موفقیت ذخیره شده.'
//        ]);
    }

    public function update(UpdateRequest $request)
    {
        try {
            $user = User::findOrFail($request->id);
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->birth = $request->birth;
//        $user->code = $request->code;
//            $user->image_path = $request->image_path;
                $user->save();
            }
            return response()->json([
                'status' => '201'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => '500',
                'message' => 'خطایی در سرور رخ داده است لطفا مجددا اقدام نمایید'

            ]);
        }
    }

    public function message()
    {

    }


    public function login(Request $request)
    {
        auth()->attempt([
            'username' => $request->tel,
            'password' => $request->password
        ]);
        if (auth()->check()) {
            return response(['token' => auth()->user()->generateToken()]);
        }
        return response([
            'error' => 'اطلاعات وارد شده صحیح نمی باشد'
        ], 401);
    }

    public function logout()
    {
        $user = auth()->guard('api')->user();
        $user->logout();
        return response()->json([
            'status' => '200',
            'message' => 'خروج با موفقیت'
        ]);

    }
}
