<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $department = Department::paginate(10);

        return view('department.index', compact('department'));
    }

    public function create() {
        return view('department.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $department = new Department();
        $department->active = 1;
        $department->name = $request->input('name');
        $department->start_date = $request->input('start_date');
        $department->end_date = $request->input('end_date');
        $department->save();

        return redirect('/department')->with('success', 'Employee stored successfully!');
    }
}
