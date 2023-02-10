@extends('layouts.app')

@section('title')
    Add Employee
@endsection

@section('content')
    <div class="content-header employee">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="/companies/{{$company->id}}"><i class="fas fa-arrow-left"></i></a><br>
                    <div class="d-flex my-4">
                        <div class="mr-4">
                            <img class="companyLogo" src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.svg')}}" alt="">
                        </div>
                        <div>
                            <h1 class="m-0 font-weight-bold">{{$company->name}}</h1>
                            <h4 class="mt-3 mb-0"><b>Email:</b> {{$company->email}}</h4>
                            <h4><b>Website:</b> {{$company->website}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5 card card-outline card-primary">
                        <form method="POST" action="/companies/{{$company->id}}/add-employee">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstNameInput" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstNameInput" placeholder="Juan" name="first_name">
                                    @if ($errors->has('first_name'))
                                    <div class="error">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastNameInput" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastNameInput" placeholder="Dela Cruz" name="last_name">
                                    @if ($errors->has('last_name'))
                                    <div class="error">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="emailInput" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="abc@example.com" name="email">
                                    @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phoneInput" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phoneInput" placeholder="0912345678" name="phone">
                                    @if ($errors->has('phone'))
                                    <div class="error">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            {{-- Company ID --}}
                            <input type="text" class="form-control" id="companyIDInput" placeholder="0912345678" name="company_id" value="{{$company->id}}" hidden>
                            <button type="submit" class="btn btn-success">Add Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
