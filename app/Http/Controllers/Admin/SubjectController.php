<?php

namespace App\Http\Controllers\Admin;

use App\Subject;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Services\SubjectService;
use App\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::All();
        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subjects.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        if($request->validator->failed()){
            return response()->json(['error' => $request->validator->errors()->all()]);
        }
        else{
            $subject = Subject::create([
                'name' => $request->name,
                'image' => $request->image,
                'description' => $request->description,
            ]);
            foreach($request->input('task') as $key=>$value){
                Task::create([
                    'subject_id' => $subject->id,
                    'name' => $value,
                ]);
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
        try {
            $subject = $this->subjectService->FindSubjectById($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('alert', $e->getMessage());
        }
        $tasks = $subject->tasks()->get();
        return view('admin.subjects.show', compact('subject', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $subject = $this->subjectService->FindSubjectById($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('alert', $e->getMessage());
        }
        return view('admin.subjects.edit', compact('subject'));
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
        try {
            $subject = $this->subjectService->FindSubjectById($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('alert', $e->getMessage());
        }
        $subject->update($request->all());
        return redirect()->back()->with('alert', 'Updated!');
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

    private $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->middleware('auth');
        $this->subjectService = $subjectService;
    }
}
