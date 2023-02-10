@extends('layouts.app')

@section('title')
    About
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('About') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <div class="card-body">
                            <h2><b>Mini-CRM</b></h2><br>
                            <p>
                                Mini-CRM is a web-based company and employee management system built using the Laravel PHP framework. It provides a comprehensive set of features for managing and organizing information about a company and its employees. With Mini-CRM, companies can keep track of employee information.
                                <br><br>

                                The system is designed to be user-friendly, with a modern and intuitive interface that makes it easy to navigate and access the information you need. Additionally, Mini-CRM is highly customizable, allowing users to configure and extend the system to meet their specific needs.
                                <br><br>
                                This project is being submitted as part of a programming exam to showcase the skills and knowledge of the developer in building a functional and scalable web application using Laravel.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
