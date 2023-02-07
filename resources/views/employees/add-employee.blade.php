@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="/companies/{{$company->id}}"><i class="fas fa-arrow-left"></i></a><br>
                    <div class="d-flex my-4">
                        <div class="mr-4">
                            <img class="companyLogo" src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.svg')}}" alt="">
                        </div>
                        <div>
                            <h1 class="m-0">{{$company->name}}</h1>
                            <p>{{$company->email}}</p>
                            <p>{{$company->website}}</p>
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
                            <div class="d-flex flex-wrap">
                                <div class="mb-3 flex-fill mr-3">
                                    <label for="firstNameInput" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstNameInput" placeholder="Juan" name="first_name">
                                    @if ($errors->has('first_name'))
                                    <div class="error">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3 flex-fill ml-3">
                                    <label for="lastNameInput" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastNameInput" placeholder="Dela Cruz" name="last_name">
                                    @if ($errors->has('last_name'))
                                    <div class="error">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="mb-3 flex-fill mr-3">
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="abc@example.com" name="email">
                                    @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3 flex-fill ml-3">
                                    <label for="phoneInput" class="form-label">Phone</label>
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
