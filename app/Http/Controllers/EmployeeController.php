<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index(){
        $employee =  Employee::with(['department', 'position'])->paginate(10);

        return view('employee.index' , compact('employee'));
    }
    
    public function create() {
        return view('employee.create');
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => ['required'],
            'department_id' => ['required'],
            'position_id' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required']
        ]);

        $employee = new Employee();
        $employee->user_id = $request->input('user_id');
        $employee->active = 1;
        $employee->department_id = $request->input('department_id');
        $employee->position_id = $request->input('position_id');
        $employee->start_date = $request->input('start_date');
        $employee->end_date = $request->input('end_date');
        $employee->save();

        return redirect('/employee')->with('success', 'Employee stored successfully!');
    }

    public function show(Employee $employee) {
        return view('employee.show', ['employee' => $employee]);
    }

    public function edit(Employee $employee) {
        return view('employee.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee) {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'integer'],
        ]);
    
        $employee->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
    
        return redirect('employee/' . $employee->id);
    }
    public function destroy(Employee $employee) {
        $employee->delete();

        return redirect('employee');
    }
}
