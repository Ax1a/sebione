<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index() {
        return view('home', [
            'companyCount' => Company::get()->count(),
            'employeeCount' => Employee::get()->count()
        ]);
    }
}
