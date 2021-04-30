<?php

namespace App\Interfaces;


interface IEmployeeService
{
    public function addEmployee($payload);

    public function deleteEmployee($employee_id);

    public function updateEmployee($employee_id, $payload);
}
