<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\grade;
use App\Models\student;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userdata = Auth::User();
        $studentData = student::where('user_id', $userdata->id)->orderBy('id', 'desc')->get();
        return view('dashboard', compact('userdata','studentData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $studentData = student::find($id);

        return view('creategrade')->with('studentData', $studentData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {   
        $studentId = Student::find($id);
        $input = $request->all();
        grade::create($input);
        return back()->with('studentId', $studentId);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studentData = student::find($id);
        
        return View ('showgrade')->with('studentData', $studentData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $studentData = grade::where('student_id', $id)->get();

        return view('editgrade', compact('studentData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gradeData = grade::find($id);
        $input = $request->all();
        $gradeData->update($input);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = student::find($id);

        $record->delete();
        return redirect('/dashboard');
    }
}
