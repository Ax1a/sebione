@extends('layouts.app')

@section('title')
    Edit Company
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/companies"><i class="fas fa-arrow-left"></i></a>
                    <h1 class="m-0">{{ __('Edit Company') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content editCompany">
        <div class="container-fluid">
            <div class="card w-100 p-4">
                <form method="POST" action="/companies/{{$company->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="companyNameInput" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyNameInput" placeholder="ABC Company" name="name" value="{{$company->name}}">
                            @if ($errors->has('name'))
                            <div class="error">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="emailAddressInput" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="emailAddressInput" placeholder="name@example.com" name="email" value="{{$company->email}}">
                            @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="chooseFile" class="form-label">Logo</label>
                            <div class="file-upload">
                                <div class="file-select">
                                  <div class="file-select-button" id="fileName">Choose File</div>
                                  <div class="file-select-name" id="noFile">No file chosen...</div>
                                  <input type="file" id="chooseFile" name="logo">
                                </div>
                            </div>
                            <div class="preview-holder my-3">
                                <img id="preview-image-before-upload" src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.svg')}}""
                                    alt="preview image" style="max-height: 200px; max-width: 300px">
                            </div>
                            @if ($errors->has('logo'))
                            <div class="error">
                                {{ $errors->first('logo') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="websiteInput" class="form-label">Website</label>
                            <input type="text" class="form-control" id="websiteInput" placeholder="name@example.com" name="website" value="{{$company->website}}">
                            @if ($errors->has('website'))
                            <div class="error">
                                {{ $errors->first('website') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update Company</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#chooseFile').bind('change', function () {
            var filename = $("#chooseFile").val();
            if (/^\s*$/.test(filename)) {
                $(".file-upload").removeClass('active');
                $("#noFile").text("No file chosen...");
            }
            else {
                $(".file-upload").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));

                if (/\.(jpg|jpeg|gif|png|bmp|svg)$/i.test(filename)) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        // get loaded data and render thumbnail.
                        $('#preview-image-before-upload').attr('src', e.target.result);

                    };
                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0]);
                }
            }
        });
    </script>
@endsection

