<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = '';
        $courses = Course::where('title' , '!=' , null)->orderBy('id' , 'DESC');
        if ($request->q){
            $courses = $courses->where('title' , 'LIKE' , '%'.$request->q.'%')->orWhere('description' , 'LIKE' , '%'.$request->q.'%');
            $q = $request->q;
        }
        $courses = $courses->paginate(15)->appends('q' , $request->q);
        return view('course.list' , compact(['courses' , 'q']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $course = new Course();
            $course->title = $request->title;
            $course->description = $request->description;
            $course->price = $request->price;
            $course->discount = $request->discount;
            $course->level = $request->level;
            $course->status = $request->status;
            $imageName = 'image-' . time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'images', $imageName
            );
            $course->image = $imageName;
            $course->save();

            return back()->with(['success' => 'Great! The course published successfully.']);
        }catch (\Exception $exception){
            return back()->with(['error' => 'Something is wrong. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
