<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $like = new Like();
        $like->user_id = $request->user_id;
        $like->course_id = $request->course_id;
        $like->save();
    }
    public function human(Request $request)
    {
        $courses= Like::select('courses.title')->where('user_id', $request->user_id)
            ->rightJoin('courses', 'likes.course_id', '=', 'courses.id')->get();
        return $courses;
    }
    public function count(Request $request)
    {
        $count=Like::where('course_id',$request->course_id)->count();
        return $count;
    }

    public function top()
    {
//        $courses=Like::with('user')->get()->sortBy(function($courses)
//        {
//            return $courses->user->count();
//        });
//        return $courses;
        $courses = Course::withCount('likes')->orderByDesc('likes_count')->limit(2)->get();
        return $courses;

    }


}
