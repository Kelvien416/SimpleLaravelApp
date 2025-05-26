<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $position = Position::paginate(10);

        return view('position.index', compact('position'));
    }

    public function create() {
        return view('position.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $position = new Position();
        $position->active = 1;
        $position->name = $request->input('name');
        $position->start_date = $request->input('start_date');
        $position->end_date = $request->input('end_date');
        $position->save();

        return redirect('/position')->with('success', 'Employee stored successfully!');
    }
}
