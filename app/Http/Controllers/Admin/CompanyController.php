<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        // return view('companies.index', [
        //     'companies' => Company::paginate(10)
        // ]);

        return view('companies.index', [
            'companies' => Company::latest()->filter(request(['search']))->paginate(10)
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

    public function search(Request $request) {
        $search_text = $request->input('query');
        $companies = Company::where('name', 'LIKE', '%' . $search_text . '%')->get();

        return view('search', compact('companies'));
   }

}
