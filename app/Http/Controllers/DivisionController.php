<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $divisions = Division::all();
        return view('dashboard.division.index', compact('divisions'));
    }

    public function add()
    {
        return view('dashboard.division.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'division'=>'required'
        ]);        

        $division = new Division([
            'division' => $request->get('division'),
        ]);
        $division->save();
        return redirect('/dashboard/division')->with('success', 'Data telah ditambahkan!');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $divisions = Division::find($id);
        return view('dashboard.division.edit', compact('divisions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'division'=>'required'
        ]);        

        $divisions = Division::find($id);
        $divisions->division =  $request->get('division');
        $divisions->save();
        return redirect('/dashboard/division')->with('success', 'Data telah diperbarui!');
    }

    public function delete($id)
    {
        $divisions = Division::find($id);
        $divisions->delete();
        return redirect('/dashboard/division')->with('success', 'Data telah dihapus!');
    }
}
