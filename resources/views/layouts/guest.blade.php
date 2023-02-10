<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page vh-100">
<div class="container-fluid px-3 px-lg-5">
    <div class="row align-items-center px-0 px-lg-5">
        <div class="col-md-6">
            <div class="login-logo">
                <svg id="Layer_2" style="width: 100px; margin-bottom: 30px" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 719.06 719.06">
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #1586FF;
                        }
                      </style>
                    </defs>
                    <g id="Layer_1-2" data-name="Layer 1">
                      <path class="cls-1" d="m359.53,0C160.97,0,0,160.97,0,359.53s160.97,359.53,359.53,359.53,359.53-160.97,359.53-359.53S558.09,0,359.53,0Zm240.81,541.8c-1.68,5.57-5.45,10.17-10.6,12.94-5.14,2.77-11.05,3.37-16.64,1.68-5.57-1.68-10.17-5.44-12.94-10.6l-15.41-28.67v18.3c0,15.51-12.61,28.13-28.13,28.13h-37.69c-15.51,0-28.13-12.62-28.13-28.13v-18.34l-15.48,28.72c-5.68,10.54-18.95,14.55-29.57,8.92-5.15-2.73-8.91-7.32-10.59-12.93-1.67-5.58-1.08-11.49,1.65-16.65l27.51-51.15c-.98-1.18-1.78-2.39-2.41-3.66l-15.37-28.6v30.87c0,15.51-12.61,28.13-28.12,28.13h-37.7c-15.51,0-28.13-12.62-28.13-28.13v-30.91l-15.48,28.72c-.71,1.31-1.5,2.48-2.38,3.57l27.51,51.15c2.77,5.14,3.37,11.05,1.68,16.64-1.68,5.57-5.44,10.17-10.59,12.94-5.15,2.77-11.06,3.37-16.65,1.68-5.57-1.68-10.17-5.44-12.94-10.6l-2.38-4.42h.07l-13.09-24.29v18.34c0,15.51-12.62,28.13-28.13,28.13h-37.7c-15.51,0-28.12-12.62-28.12-28.13v-18.34l-15.49,28.72c-5.68,10.55-18.94,14.55-29.56,8.92-10.6-5.62-14.61-18.88-8.95-29.58l29.78-55.22c12.56-23.4,36.89-37.94,63.5-37.94h15.31c12.03,0,23.88,3.03,34.47,8.77l24.92-46.22c12.56-23.39,36.9-37.93,63.5-37.93h15.32c26.52,0,50.85,14.53,63.5,37.93l24.92,46.22c10.59-5.74,22.44-8.77,34.47-8.77h15.32c26.52,0,50.85,14.54,63.49,37.94l29.77,55.2c2.77,5.15,3.37,11.06,1.68,16.65Zm-413.39-150.84c0-18.97,15.44-34.41,34.41-34.41s34.41,15.44,34.41,34.41-15.44,34.41-34.41,34.41-34.41-15.43-34.41-34.41Zm138.21-75.39c0-18.97,15.43-34.41,34.41-34.41s34.41,15.44,34.41,34.41-15.44,34.42-34.41,34.42-34.41-15.44-34.41-34.42Zm138.21,75.39c0-18.97,15.43-34.41,34.41-34.41s34.41,15.44,34.41,34.41-15.44,34.41-34.41,34.41-34.41-15.43-34.41-34.41Zm146.89-68.03c-7.57,13.55-24.73,18.44-38.24,10.89l-212.45-118-212.53,118.08c-4.22,2.36-8.88,3.56-13.59,3.56-2.6,0-5.21-.36-7.77-1.1-7.23-2.06-13.22-6.8-16.88-13.35-3.65-6.55-4.53-14.14-2.46-21.37,2.06-7.23,6.81-13.22,13.36-16.88l226.24-125.72c8.56-4.77,18.78-4.77,27.34,0l10.1,5.62h-.06l216.04,120.02c6.55,3.66,11.3,9.66,13.36,16.88,2.07,7.23,1.19,14.82-2.46,21.37Z"/>
                    </g>
                  </svg>
                <h1 class="font-weight-bold">{{ config('app.name', 'Laravel') }}</h1>
                <p style="font-size: 27px">A company and employee management system using Laravel.</p>
            </div>
        </div>
        <div class="col-md-6 px-0 px-lg-5">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                @yield('content')
            </div>
        </div>
    </div>


</div>
<!-- /.login-box -->

@vite('resources/js/app.js')
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
</body>
</html>
