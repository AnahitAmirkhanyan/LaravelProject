<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCompanyValidateRequest;
use App\Http\Requests\EditCompanyValidateRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function companies() {
        $data = Company::orderBy('created_at')->paginate(5);

        return view('companies', compact('data'));
    }

    public function addCompany(AddCompanyValidateRequest $request) {
        $payload = [
            'company_name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone,
        ];

        if($request->hasFile('file')) {
            $payload['logo'] = $request->file;
        }
        $this->companyService->addCompany($payload);

        return redirect()->to('/companies');
    }

    public function showCompanyDetails(CompanyService $companyService) {
        $companies = $companyService->getCompaniesWithEmployees();

        return view('details', ['companies' => $companies]);
    }

    public function deleteCompany(CompanyService $companyService, Request $request) {
        $companyService->deleteCompany($request->company_id);

        return redirect()->to('/companies')->withSuccess("Company deleted successfully!");
    }

    public function updateCompany(CompanyService $companyService, EditCompanyValidateRequest $request) {
        $payload = [
            'company_name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone
        ];

        $updated = $companyService->updateCompany($request->company_id, $payload);

        if($updated) {
            return redirect()->to('/companies')->withSuccess("Company edited successfully!");
        }

        return redirect()->to('/companies')->withErrors("Failure.");
    }

}
