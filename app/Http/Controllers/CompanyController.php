<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCompanyValidateRequest;
use App\Http\Requests\EditCompanyValidateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
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

        if($request->hasFile('file')){
            $payload['logo'] = $request->file->hashName();
            $request->file->storeAs('public', $request->file->hashName());
        }
        Company::create($payload);

        return redirect()->to('/companies');
    }

    public function showCompanyDetails() {
        $companies = Company::with('employees')->get();

        return view('details', ['companies' => $companies]);
    }

    public function deleteCompany(Request $request) {
        Company::destroy($request->company_id);

        return redirect()->to('/companies')->withSuccess("Company deleted successfully!");
    }

    public function updateCompany(EditCompanyValidateRequest $request) {
        $payload = [
            'company_name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone
        ];

        $updated = Company::find($request->company_id)->update($payload);

        if($updated) {
            return redirect()->to('/companies')->withSuccess("Company edited successfully!");
        }

        return redirect()->to('/companies')->withErrors("Failure.");
    }

}
