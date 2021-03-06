<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourse;
use App\Course;
use App\Task;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.home', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::all();
        return view('courses.create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\StoreCourse  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
        $request->persist();
        return redirect('/courses')->with('status', 'Course created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.course', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $tasks = Task::all();
        //$tasks = $course->tasks()->get();
        return view('courses.edit', compact('course', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\StoreCourse  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourse $request, $id)
    {
        $request->savechanges($id);
        return redirect('/courses');//->back();
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
