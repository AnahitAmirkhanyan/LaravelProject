<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeValidateRequest;
use App\Http\Requests\EditEmployeeValidateRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Rules\EmailRule;
use App\Rules\RequiredRule;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function employees() {
        $payload = Employee::orderBy('created_at')->paginate(5);
        $comp = Company::orderBy('created_at')->get()->toArray();

        $companies = $this->transformCompanies($comp);

        return view('employees', compact('payload', 'companies'));
    }

    public function addEmployee(AddEmployeeValidateRequest $request) {

        $payload = [
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company_id
        ];
        Employee::create($payload);

        return redirect()->to('/employees');
    }

    public function transformCompanies($companies) {
        return array_map(function ($company) {
            return [
                'id' => $company['id'],
                'company_name' => $company['company_name']
            ];
        }, $companies);
    }

    public function deleteEmployee(Request $request) {
       Employee::destroy($request->employee_id);

       return redirect()->to('/employees')->withSuccess("Employee deleted successfully!");
    }

    public function updateEmployee(EditEmployeeValidateRequest $request) {
        $payload = [
            'first_name'  => $request->e_first_name,
            'last_name'  => $request->e_last_name,
            'email' => $request->e_email,
            'company_id' => $request->e_company_id
        ];
        $updated = Employee::find($request->employee_id)->update($payload);

        if($updated){
            return redirect()->to('/employees')->withSuccess("Employee edited successfully!");
        } else {
            return redirect()->to('/employees')->withErrors("Failure.");
        }

    }
}
