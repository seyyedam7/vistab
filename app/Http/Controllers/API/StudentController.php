<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\student\CreateRequest;
use App\Http\Requests\API\student\UpdateRequest;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
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
