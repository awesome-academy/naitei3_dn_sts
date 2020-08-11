<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\task;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $courses = $user->courses;
        if($courses == null)
            return view('courses.index', compact('courses'))->with('alert', 'Not found');
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::find($id);

        if($courses == null)
            return view('courses.index', compact('courses'))->with('alert', 'Not found course with id '+$id);

        $this->authorize('view', $courses);

        $trainers = $courses->users()->wherePivot('role', 0)->get();
        $trainees = $courses->users()->wherePivot('role', 1)->get();
        $subjects = $courses->subjects()->get();
        $tasks = [];
        $user_info = $courses->users()->wherePivot('user_id', auth()->user()->id)->first();

        foreach ($subjects as $subject)
        {
            $tasks[$subject->id] = $subject->tasks()->get()->toArray();
            for($i = 0; $i < $subject->tasks()->get()->count(); $i++){
                if($subject->tasks()->get()[$i]->users()->wherePivot('user_id', auth()->user()->id)->first() != null)
                    $tasks[$subject->id][$i]['status'] = $subject->tasks()->get()[$i]->users()->wherePivot('user_id', auth()->user()->id)->first()->pivot->status;
                else
                    $tasks[$subject->id][$i]['status'] = 0;
            }
        }

        return view('courses.show', compact('trainers', 'trainees', 'subjects', 'courses', 'user_info', 'tasks'));
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

    public function __construct()
    {
        $this->middleware('auth');
    }
}
