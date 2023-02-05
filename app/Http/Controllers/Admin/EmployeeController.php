<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        // $users = User::paginate();

        // return view('employees.index');
    }

    public function create(Company $company) {
        return view('employees.add-employee', [
            'company' => $company
        ]);
    }
}
