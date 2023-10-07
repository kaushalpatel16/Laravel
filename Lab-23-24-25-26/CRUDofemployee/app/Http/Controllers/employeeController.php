<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    //

    function create(){
        return view('insertemployee');
    }

    function editform($id){
        $employee = employee::find($id);
        return view('insertemployee',['employee'=>$employee]);
    }

    function list(){
        $employees = employee::all();

        return view('listemployees', ['employees'=>$employees]);
    }

    function detail($id){
        $employee = employee::find($id);

        return view('detailemployee', ['employee'=>$employee]);
    }

    function delete($id){
        $employee = employee::find($id);
        $employee->delete();
        return redirect()->route('listemployees')->with('success', 'employee deleted successfully.');
    }

    function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'branch' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:employees'
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'branch.required' => 'Branch field is required.',
            'email.unique' => 'Email Must be unique.',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $employee = employee::create($validatedData);

        return redirect()->route('listemployees')->with('success', 'employee created successfully.');
    }

    function update(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'branch' => 'required',
            'email' => 'required|email|unique:employees,email,'.$request->id
        ], [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'branch.required' => 'Branch field is required.',
            'email.unique' => 'Email Must be unique.',
        ]);

        $employee = employee::find($request->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->branch = $request->branch;
        $employee->save();

        return redirect()->route('listemployees')->with('success', 'employee updated successfully.');
    }
}
