<?php

namespace App\Interfaces;

interface ICompanyService
{
    public function addCompany($payload);

    public function getCompaniesWithEmployees();

    public function deleteCompany($company_id);

    public function updateCompany($company_id, $payload);

    public function mapCompanyIdName($companies);

    public function getCompaniesByDateCreated();
}
