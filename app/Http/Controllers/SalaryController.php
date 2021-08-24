<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function index()
    {
        $now = Carbon::now('Asia/Jakarta');
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $bulan = $months[$now->month-1];

        $employees = [];
        $excepts = [];
        $salary = Salary::where('bulan', $bulan)->where('tahun', $now->year)->get();
        $emp = Employee::with('position')->get();

        foreach($salary as $s){
            array_push($excepts, $s->employee_id);
        }

        foreach($emp as $e){
            if(!in_array($e->id, $excepts))  array_push($employees, $e);
        }

        return view('dashboard.salary.index', compact('employees'));
    }

    public function pay($id)
    {
        
        $employee = Employee::where('employees.id', $id)
                    ->join('positions', 'employees.position_id', '=', 'positions.id')
                    ->select('employees.*', 'positions.position')
                    ->get();

        return view('dashboard.salary.pay', compact('employee'));
    }

    public function store(Request $request){
        $now = Carbon::now('Asia/Jakarta');
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $bulan = $months[$now->month-1];

        $request->validate([
            'employee_id'=>'required',
            'tunjangan_pj'=>'nullable',
            'jasa_swab'=>'nullable',
            'lembur'=>'nullable',
            'lain'=>'nullable',
            'deskripsi'=>'nullable',
            'tabungan'=>'nullable',
            'piutang'=>'nullable',
            'bpjs_naker'=>'nullable',
            'bpjs_kesehatan'=>'nullable',
            'dplk_bri'=>'nullable'
        ]);

        $penghasilanNama = $request->get('penghasilan-a');
        $penghasilanValue = $request->get('penghasilan-b');
        $potonganNama = $request->get('potongan-a');
        $potonganValue = $request->get('potongan-b');

        $penghasilan = [];
        $potongan = [];
        
        for($i = 0; $i < count($penghasilanNama); $i++){
            $nama = $penghasilanNama[$i];
            $value = $penghasilanValue[$i];
            $penghasilan[$nama] = $value;
        }

        for($i = 0; $i < count($potonganNama); $i++){
            $nama = $potonganNama[$i];
            $value = $potonganValue[$i];
            $potongan[$nama] = $value;
        }

        $employee = Employee::find($request->get('employee_id'));

        $salary = new Salary([
            'bulan' => $bulan,
            'tahun' => $now->year,
            'employee_id' => $employee->id,
            'user_id' => Auth::id(),
            'penghasilan' => json_encode($penghasilan),
            'potongan' => json_encode($potongan)
        ]);
        
        $salary->save();
        
        return redirect('/dashboard/salary')->with('success', 'Data telah ditambahkan!');
    }
}