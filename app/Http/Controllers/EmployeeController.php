<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeValidateRequest;
use App\Http\Requests\EditEmployeeValidateRequest;
use App\Models\Employee;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(CompanyService $companyService, EmployeeService $employeeService)
    {
        $this->companyService = $companyService;
        $this->employeeService = $employeeService;
    }

    public function employees()
    {
        $payload = Employee::orderBy('created_at')->paginate(5);
        $comp = $this->companyService->getCompaniesByDateCreated();

        $companies = $this->companyService->mapCompanyIdName($comp);
        return view('employees', compact('payload', 'companies'));
    }

    public function addEmployee(EmployeeService $employeeService, AddEmployeeValidateRequest $request)
    {
        $payload = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company_id
        ];
        $employeeService->addEmployee($payload);

        return redirect()->to('/employees');
    }

    public function deleteEmployee(Request $request)
    {
        $this->employeeService->deleteEmployee($request->employee_id);

        return redirect()->to('/employees')->withSuccess("Employee deleted successfully!");
    }

    public function updateEmployee(EditEmployeeValidateRequest $request)
    {
        $payload = [
            'first_name' => $request->e_first_name,
            'last_name' => $request->e_last_name,
            'email' => $request->e_email,
            'company_id' => $request->e_company_id
        ];
        $updated = $this->employeeService->updateEmployee($request->employee_id);

        if ($updated) {
            return redirect()->to('/employees')->withSuccess("Employee edited successfully!");
        } else {
            return redirect()->to('/employees')->withErrors("Failure.");
        }

    }
}
