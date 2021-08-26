<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    public function index(){
        $employees = Employee::join('divisions', 'divisions.id', '=', 'employees.division_id')
                    ->join('positions', 'positions.id', '=', 'employees.position_id')
                    ->select('employees.*', 'positions.position', 'divisions.division')
                    ->get();
        $month = "";
        return view('dashboard.print.index', compact('employees', 'month'));
    }

    public function print($month, $id){
        $salary = Salary::join('employees', 'employees.id', '=', 'salary.employee_id')
                ->join('positions', 'positions.id', '=', 'employees.position_id')
                ->join('divisions', 'divisions.id', '=', 'employees.division_id')
                ->where([
                    ['employee_id', '=', $id],
                    ['salary.bulan', '=', $month],
                ])
                ->first();
                
        if(!$salary) return view('dashboard.print.empty');
        
        $penghasilan = json_decode($salary->penghasilan);
        $potongan = json_decode($salary->potongan);
        
        // $pdf = PDF::loadview('dashboard.print.show', [
        //     'salary'=>$salary, 
        //     'penghasilan'=>$penghasilan,
        //     'potongan'=>$potongan,
        //     'total_potongan'=>$total_potongan,
        //     'total_penghasilan'=>$total_penghasilan
        // ]);
        // return $pdf->stream();
        $total_penghasilan = 0;
        foreach($penghasilan as $p){
            $total_penghasilan += str_replace(".", "", $p);
        }

        $total_potongan = 0;
        foreach($potongan as $p){
            $total_potongan += str_replace(".", "", $p);
        }

        $penghasilan_bersih = $total_penghasilan - $total_potongan;

        return view('dashboard.print.show', compact('salary', 'penghasilan', 'potongan', 'total_penghasilan', 'total_potongan', 'penghasilan_bersih'));
    }
}