<?php


namespace App\Services;


use App\Interfaces\EmployeeServiceInterface;
use App\Models\Employee;

class EmployeeService implements EmployeeServiceInterface
{
    public function addEmployee($payload)
    {
        return Employee::create($payload);
    }

    public function deleteEmployee($employee_id)
    {
        return Employee::destroy($employee_id);
    }

    public function updateEmployee($employee_id, $payload) {
        return Employee::find($employee_id)->update($payload);
    }
}
