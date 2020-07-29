<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Subject;
use DateTime;
use Illuminate\Http\Request;
use \Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Course::class);
        $courses = Course::select('id', 'name', 'status', 'start_day', 'end_day')->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.courses.new', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        if($request->validator->failed()){
            return response()->json(['error' => $request->validator->errors()->all()]);
        }
        else{
            $course = Course::create($request->all());

            foreach($request->input('subject') as $key=>$value){
                $subject = Subject::find($value);
                $subject->courses()->attach($course->id, ['status' => 0]);
            }
            return response()->json(['success' => 'Done']);
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
        $course = Course::select('id', 'name', 'description', 'duration', 'duration_type', 'status', 'image', 'start_day', 'end_day')->find($id);
        $course_subjects = $course->subjects;
        $subject_tasks = [];
        $course_users = $course->users;
        foreach ($course_subjects as $subject) 
        {
            $subject_tasks[$subject->id] = $subject->tasks;
        }
        return view('admin.courses.show', compact('course','course_subjects','subject_tasks','course_users'));
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

    public function updateStatus(Request $request)  
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $current_day = new DateTime();
        $html = '';
        if ($status == 1)
        {
            $html = '<span class="badge badge-success">Started</span>';
            Course::where('id', $id)->update(array('status' => $status, 'start_day' => $current_day));
        }           
        if ($status == 2)
        {
            $html = '<span class="badge badge-secondary">Ended</span>';
            
            Course::where('id', $id)->update(array('status' => $status, 'end_day' => $current_day));
        }
            
        return Response::json(array(
            'success' => true,
            'html' => $html,
            'date' => $current_day->format('Y/m/d'),
        ));
    }
}
