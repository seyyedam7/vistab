<?php

namespace App\Http\Controllers\API;
use App\Course;

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

    public function list(Request $request)
    {

        $user=User::findOrFail($request->id);
         return $user->course()->latest()->limit(2)->get();
    }

    public function status(Request $request)
    {
        $course=DB::table('course_user')->where([
            ['user_id','=',$request->user_id],
            ['course_id','=',$request->course_id],
        ])->get();


            if( $request->status == 1)
            {
                $course->status = 1;
                $course->save();
                return 'پایان دوره';
            }
            else
                {
                    return 'دوره در حال انجام';
                }


   }


}
