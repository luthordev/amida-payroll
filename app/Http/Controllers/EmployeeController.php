<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Division;
use App\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $employees = Employee::join('positions', 'positions.id', '=', 'employees.position_id')
                    ->join('divisions', 'divisions.id', '=', 'employees.division_id')
                    ->select('employees.*', 'positions.position', 'divisions.division')
                    ->get();
        return view('dashboard.employee.index', compact('employees'));
    }

    public function add()
    {
        $positions = Position::all();
        $divisions = Division::all();
        return view('dashboard.employee.add', compact('positions', 'divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'=>'required',
            'name'=>'required',
            'bank'=>'required',
            'no_bank_account'=>'required',
            'position'=>'required',
            'division'=>'required',
        ]);        

        $employee = new Employee([
            'nik' => $request->get('nik'),
            'name' => $request->get('name'),
            'bank' => $request->get('bank'),
            'no_bank_account' => $request->get('no_bank_account'),
            'position_id' => $request->get('position'),
            'division_id' => $request->get('division')
        ]);
        $employee->save();
        return redirect('/dashboard/employee')->with('success', 'Data telah ditambahkan!');
    }

    public function edit($id){
        $employees = Employee::join('positions', 'positions.id', '=', 'employees.position_id')
                    ->join('divisions', 'divisions.id', '=', 'employees.division_id')
                    ->where('employees.id', $id)
                    ->select('employees.*', 'positions.position', 'divisions.division')->get();
        $positions = Position::all();
        $divisions = Division::all();
        return view('dashboard.employee.edit', compact('employees', 'positions', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'=>'required',
            'name'=>'required',
            'bank'=>'required',
            'no_bank_account'=>'required',
            'position'=>'required',
            'division'=>'required',
        ]);          

        $employees = Employee::find($id);
        $employees->nik = $request->get('nik');
        $employees->name = $request->get('name');
        $employees->bank = $request->get('bank');
        $employees->no_bank_account = $request->get('no_bank_account');
        $employees->position_id = $request->get('position');
        $employees->division_id = $request->get('division');
        $employees->save();
        return redirect('/dashboard/employee')->with('success', 'Data telah diperbarui!');
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/dashboard/employee')->with('success', 'Data telah dihapus!');
    }

}