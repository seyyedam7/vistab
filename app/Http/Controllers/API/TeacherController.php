<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function register(StoreBlogPost $request){
        $user = new User();
        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->role_id = 1;
        $user->password = Hash::make( $request->password);
        $user->remember_token=Str::random(64);
        $user->save();

    }

    public function login(StoreBlogPost $request)
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
}
