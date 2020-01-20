<?php

namespace App\Http\Controllers\API;

use App\Models\Course;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->image_path = $request->image_path;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->save();
    }

    public function list()
    {

        $courses = Course::latest()->limit(5)->get();

        return response()->json([
            'data' => $courses,
            'status' => 200,
            'message' => 'hello',
        ]);

//              return response()->json([
//            'data'=>[
//                'name'=>$user->name,
//                'password'=>$user->password
//            ],
//            'status'=>'0',
//            'message'=>'کاربر با موفقیت ذخیره شده.'
//        ]);
    }

    public function status(Request $request)
    {
        $courses = DB::table('course_user')->where([
            ['user_id', '=', $request->user_id],
            ['course_id', '=', $request->course_id],
        ])->get();

        foreach ($courses as $course)
        {
            if ($request->status == 1) {
                $course->status = 1;
                $course->save();
                return 'پایان دوره';
            } else {
                return 'دوره در حال انجام';
            }

        }





    }


}
