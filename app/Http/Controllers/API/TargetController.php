<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Target;

use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function course(Request $request)
    {
        $target = new Target();
        $target->user_id = $request->user_id;
        $target->course_id = $request->course_id;
        $target->save();
    }

    public function target(Request $request)
    {
        $courses= Target::select('courses.title')->where('user_id', $request->user_id)
            ->rightJoin('courses', 'targets.course_id', '=', 'courses.id')->get();
        return $courses;
    }

}
