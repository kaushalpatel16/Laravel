<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    function create(){
        return view('insertStudent');
    }

    function editform($id){
        $student = Student::find($id);
        return view('insertStudent',['student'=>$student]);
    }

    function list(){
        $students = Student::all();

        return view('listStudents', ['students'=>$students]);
    }

    function detail($id){
        $student = Student::find($id);

        return view('detailStudent', ['student'=>$student]);
    }

    function delete($id){
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('listStudents')->with('success', 'Student deleted successfully.');
    }

    function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'enrollment' => 'required|unique:students',
            'sem' => 'required',
            'branch' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:students'
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'enrollment.required' => 'Enrollment field is required.',
            'enrollment.unique' => 'Enrollment Must be unique.',
            'sem.required' => 'Semester field is required.',
            'branch.required' => 'Branch field is required.',
            'email.unique' => 'Email Must be unique.',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $student = Student::create($validatedData);

        return redirect()->route('listStudents')->with('success', 'Student created successfully.');
    }

    function update(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'enrollment' => 'required|unique:students,enrollment,'.$request->id,
            'sem' => 'required',
            'branch' => 'required',
            'email' => 'required|email|unique:students,email,'.$request->id
        ], [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'enrollment.required' => 'Enrollment field is required.',
            'enrollment.unique' => 'Enrollment Must be unique.',
            'sem.required' => 'Semester field is required.',
            'branch.required' => 'Branch field is required.',
            'email.unique' => 'Email Must be unique.',
        ]);

        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->enrollment = $request->enrollment;
        $student->sem = $request->sem;
        $student->branch = $request->branch;
        $student->save();

        return redirect()->route('listStudents')->with('success', 'Student updated successfully.');
    }
}
