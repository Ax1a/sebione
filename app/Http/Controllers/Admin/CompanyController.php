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
            'companies' => Company::latest("updated_at")->filter(request(['search']))->paginate(10)
        ]);
    }

    public function create() {
        return view('companies/add-company');
    }

    public function store(Request $request) {
         // Form validation
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website'=>'required'
        ]);

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|mimes:png,jpg,jpeg,svg|max:2048||dimensions:min_width=100,min_height=100'
            ]);

            try{
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');

                //  Store data in database
                Company::create($formFields);

                return redirect('/companies')->with('success', 'Company has been created!');
            }catch(\Exception $e){
                return redirect()->back()->with('error','Something goes wrong while uploading file!');
            }
        }

        //  Store data in database
        Company::create($formFields);

        return redirect('/companies')->with('success', 'Company has been created!');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect('/companies')->with('success', 'Company has been deleted!');
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
            $request->validate([
                'logo' => 'required|mimes:png,jpg,jpeg,svg|max:2048||dimensions:min_width=100,min_height=100'
            ]);

            try{
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');

                //  Store data in database
                $company->update($formFields);

                return redirect('/companies')->with('success', 'Your changes has been saved!');
            }catch(\Exception $e){
                return redirect()->back()->with('error','Something goes wrong while uploading file!');
            }
        }


       //  Store data in database
       $company->update($formFields);

       return redirect('/companies')->with('success', 'Your changes has been saved!');
   }

}
