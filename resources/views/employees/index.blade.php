@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="content-header employee">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="/companies"><i class="fas fa-arrow-left"></i></a><br>
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
                    <a href="/companies/{{$company->id}}/add-employee" class="btn btn-success my-3">Add Employee</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-4 card card-outline card-primary">
                        <table id="employees" class="table nowrap" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                      <th scope="row">{{$loop->iteration}}</th>
                                      <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                      <td>{{$employee->email}}</td>
                                      <td>{{$employee->phone}}</td>
                                      <td class="d-flex">
                                        <a href="/companies/{{$company->id}}/edit-employee/{{$employee->id}}" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>

                                        <form method="POST" action="/companies/{{$company->id}}/delete-employee/{{$employee->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger show_confirm"><i class="fas fa-trash"></i></button>
                                        </form>
                                      </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" defer></script>
    <script>
        $(document).ready( function () {
            $('#employees').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            });
        } );
    </script>

    @if(Session::has('success'))
        <script defer>
            var toastMixin = Swal.mixin({
                toast: true,
                icon: 'success',
                title: 'General Title',
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                width: '28em',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            toastMixin.fire({
                animation: true,
                title: '{{session()->get('success')}}'
            });
        </script>
    @endif

    <script defer>
        $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");

                event.preventDefault();

                Swal.fire({
                    title:'Are you sure?',
                    text: "This process cannot be undone.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonColor: '#d33',
                    reverseButtons: true,
                    dangerMode: true
                })
                .then((willDelete) => {
                    if(willDelete.isConfirmed) {
                        form.submit();
                    }
                })
            })
    </script>
@endsection
