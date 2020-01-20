<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function course(Request $request)
    {
        $course = Course::where('title', 'LIKE', '%' . $request->search . '%')->get();
        return $course;

    }
}
