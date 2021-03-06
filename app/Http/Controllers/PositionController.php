<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $positions = Position::all();
        return view('dashboard.position.index', compact('positions'));
    }

    public function add()
    {
        return view('dashboard.position.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position'=>'required',
        ]);        

        $position = new Position([
            'position' => $request->get('position'),
        ]);
        $position->save();
        return redirect('/dashboard/position')->with('success', 'Data telah ditambahkan!');
    }

    public function edit($id)
    {
        $positions = Position::find($id);
        return view('dashboard.position.edit', compact('positions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position'=>'required',
        ]);        

        $positions = Position::find($id);
        $positions->position =  $request->get('position');
        $positions->save();
        return redirect('/dashboard/position')->with('success', 'Data telah diperbarui!');
    }

    public function delete($id)
    {
        $positions = Position::find($id);
        $positions->delete();
        return redirect('/dashboard/position')->with('success', 'Data telah dihapus!');
    }

}