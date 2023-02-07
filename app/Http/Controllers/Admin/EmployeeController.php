<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Company $company)
    {
        $company = Company::find($company->id);
        // dd($company->employee);
        return view('employees.index', [
            'employees' => $company->employee,
            'company' => $company
        ]);
    }

    public function create(Company $company) {
        return view('employees.add-employee', [
            'company' => $company
        ]);
    }

    public function store(Request $request, Company $company) {
        // Form validation
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'company_id' => 'required'
        ]);

       //  Store data in database
       Employee::create($formFields);

       // return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
       return redirect('/companies/' . $company->id)->with('success', 'Employee created successfully!');
   }

   public function update(Request $request, Company $company, Employee $employee) {
        // Form validation
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone'=>'required'
        ]);

        //  Store data in database
        $employee->update($formFields);

        return redirect('/companies/'. $company->id)->with('success', 'Employee updated successfully!');
   }

   public function edit(Company $company, Employee $employee) {

        return view('employees.edit-employee', [
            'company' => $company,
            'employee' => $employee
        ]);
   }

   public function destroy(Company $company, Employee $employee){
    $employee->delete();
    return redirect('/companies/' . $company->id)->with('success', 'Company deleted successfully!');
}

}
