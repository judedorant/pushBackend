<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterfile;


class ProfileController extends Controller
{
    //
    public function index(Request $request){

        $employee_number = $request->employee_number;

        $employee = Masterfile::select([
            'firstName','middleName','lastName','suffix','birthDate','gender',
            'civil_status_name','contactNumber','contactNumber2','telNumber',
            'oldAddress','street','subd','sitio','brgy','city','province',
            'empNumber','waveNumber','branchName','empDate','TaxStatusName',
            'departments.department','departments.position',
            'tin','sss','philhealth','hdmf','availedSIL', 'empNumber'
        ])
        ->leftJoin('employeeaccount', 'employeeaccount.empID', '=', 'employee.empID')
        ->leftJoin('employeeaddress', 'employeeaddress.empID', '=', 'employee.empID')
        ->leftJoin('employmentinfo', 'employmentinfo.empID', '=', 'employee.empID')
        ->leftJoin('employeecredentials', 'employeecredentials.empID', '=', 'employee.empID')
        ->leftJoin('employeepaydetails', 'employeepaydetails.empID', '=', 'employee.empID')
        ->leftJoin('employee_sil', 'employee_sil.empID', '=', 'employee.empID')

        ->leftJoin('civil_status', 'civil_status.civil_status_id', '=', 'employeepaydetails.civilStatus')
        ->leftJoin('taxstatus', 'taxstatus.TaxStatusID', '=', 'employeepaydetails.taxStatus')
        ->leftJoin('departments', 'departments.idDep', '=', 'employmentinfo.position')
        ->leftJoin('branch', 'branch.branchID', '=', 'employmentinfo.branchID')
        ->where('empNumber', $employee_number)
        ->first();

        $dataarray[] = $employee;


        return response()->json([
            'success' => true,
            'data' => $dataarray,
            'errors' => false
        ], 200);

    }
}
