@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/companies"><i class="fas fa-arrow-left"></i></a>
                    <h1 class="m-0">{{ __('Add Company') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <form method="POST" action="/companies" enctype="multipart/form-data">
                @csrf
                <div class="card w-100 p-4">
                    <div class="mb-3">
                        <label for="companyNameInput" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyNameInput" placeholder="ABC Company" name="name">
                        @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="emailAddressInput" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="emailAddressInput" placeholder="name@example.com" name="email">
                        @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="websiteInput" class="form-label">Website</label>
                        <input type="text" class="form-control" id="websiteInput" placeholder="name@example.com" name="website">
                        @if ($errors->has('website'))
                        <div class="error">
                            {{ $errors->first('website') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input class="form-control" type="file" id="logo" name="logo">
                        @if ($errors->has('logo'))
                        <div class="error">
                            {{ $errors->first('logo') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </div>
            </form>
        </div>
    </div>
@endsection