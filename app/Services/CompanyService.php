<?php


namespace App\Services;


use App\Interfaces\ICompanyService;
use App\Models\Company;

class CompanyService implements ICompanyService
{
    public function addCompany($payload) {

        if($payload['logo']){
            $payload['logo']->storeAs('public', $payload['logo']->hashName());
            $payload['logo'] = $payload['logo']->hashName();
        }
        Company::create($payload);
    }

    public function getCompaniesWithEmployees() {
        return Company::with('employees')->get();
    }

    public function deleteCompany($company_id) {
        Company::destroy($company_id);
    }

    public function updateCompany($company_id, $payload) {
        return Company::find($company_id)->update($payload);
    }

    public function mapCompanyIdName($companies) {
        return array_map(function ($company) {
            return [
                'id' => $company['id'],
                'company_name' => $company['company_name']
            ];
        }, $companies);
    }

    public function getCompaniesByDateCreated() {
        return Company::orderBy('created_at')->get()->toArray();
    }
}
