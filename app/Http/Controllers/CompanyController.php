<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Models\CustomizeField;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('customizeFields')->select('id', 'name', 'address')->get();

        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        if (count($request->labels) > 0) {
            $customizeFields = self::setCustomizedData($company->id, $request);
            CustomizeField::insert($customizeFields);
        }

        $this->setSuccessMessage(__('Data Submited Successfully'));

        return redirect()->back();
    }

    public function edit(Company $company)
    {
        $company->load('customizeFields');

        return view('company.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        if (count($request->labels) > 0) {

            $customizeFields = self::setCustomizedData($company->id, $request);

            //First Delete Before Data
            if ($company->customizeFields) {
                $company->customizeFields()->delete();
            }
            CustomizeField::insert($customizeFields);
        }

        $this->setSuccessMessage(__(key: 'Data Updated Successfully'));

        return redirect()->back();
    }

    public function destroy(Company $company)
    {
        $company->delete();
        if ($company->customizeFields) {
            $company->customizeFields()->delete();
        }

        $this->setSuccessMessage(__(key: 'Data Deleted Successfully'));

        return redirect()->back();
    }

    protected function setCustomizedData($companyId, $request): array
    {
        $labels = $request->labels;
        $values = $request->values;
        $customizeFields = [];
        for ($i = 0; $i < count($labels); $i++) {
            $customizeFields[] = [
                'company_id' => $companyId,
                'label' => $labels[$i],
                'value' => $values[$i],
                'type' => 'text',
            ];
        }

        return $customizeFields;
    }
}
