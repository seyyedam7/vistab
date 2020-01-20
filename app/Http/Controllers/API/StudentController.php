<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\student\CreateRequest;
use App\Http\Requests\API\student\UpdateRequest;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function store(CreateRequest $request)
    {

        $user = new User();
        $user->tel = $request->tel;
        $user->role_id = 2;
        $user->password = Hash::make($request->password);
        $user->password_repeat = Hash::make($request->password_repeat);
        $user->remember_token = Str::random(64);
        $user->code = substr($request->tel, -4);
        $user->save();


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
        $user = User::findOrFail($request->id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->birth = $request->birth;
//        $user->code = $request->code;
            $user->image_path = $request->image_path;
            $user->save();
        }
        return response($user, 201);
    }

    public function message()
    {

    }


    public function login(Request $request)
    {
        $user = User::where('tel', $request->tel)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $data = [
                    'user_id' => $user->id,
                    'token' => $user->remember_token,
                ];

                return $data;
            } else {
                return 'رمز عبور اشتباه است';
            }
        } else {
            return 'کاربر پیدا نشد';
        }
    }

    public function group(Request $request)
    {
        $groups = User::findOrFail($request->id);
        foreach ($groups->group as $group) {
            echo $group->name;
        }


    }

    public function course(Request $request)
    {
//        $courses=User::findOrFail($request->id);
//        foreach ($courses->course as $course)
//        {
//            echo $course;
//        }
        $user = User::findOrFail($request->user_id);
        $user->course()->attach($request->course_id);
        return $user->course;

    }


}
