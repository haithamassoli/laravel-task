<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $company = Company::create($this->validateCompany());
        // validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'dimensions:min_width=100,min_height=100|image',
            'website' => 'url'
        ]);
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;


        if ($request->hasFile('logo')) {
            $imageName = $company->name . time() . '.' . $request->file('logo')->extension();
            $path = $request->file('logo')->storeAs('public', $imageName);
            $company->logo = $imageName;
        }
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $attributes = $this->validateCompany($company);
        if ($request->hasFile('logo')) {
            $imageName = $company->name . time() . '.' . $request->file('logo')->extension();
            $path = $request->file('logo')->storeAs('public', $imageName);
            $attributes['logo'] = $imageName;
        }
        $company->update($attributes);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }

    protected function validateCompany(?Company $company = null): array
    {
        $company ??= new Company();
        return request()->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'dimensions:min_width=100,min_height=100|image',
            'website' => 'url'
        ]);
    }
}
