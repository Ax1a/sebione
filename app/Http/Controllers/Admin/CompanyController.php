<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::all()
        ]);
    }

    public function create() {
        return view('companies/add-company');
    }

    public function show(Company $company) {
        return view('employees.index', [
            'company' => $company
        ]);
    }

    public function store(Request $request) {
         // Form validation
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website'=>'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        //  Store data in database
        Company::create($formFields);
        //
        // return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
        return redirect('/companies')->with('success', 'Company created successfully!');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect('/companies')->with('success', 'Company deleted successfully!');
    }

    public function edit(Company $company) {
        return view('companies.edit-company', [
            'company' => $company
        ]);
    }

    public function update(Request $request, Company $company) {
        // Form validation
       $formFields = $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'website'=>'required'
       ]);

       if($request->hasFile('logo')) {
           $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       //  Store data in database
       $company->update($formFields);
       //
       // return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
       return redirect('/companies')->with('success', 'Company created successfully!');
   }
}
