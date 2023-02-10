@extends('layouts.app')

{{-- @section('title')
    Companies
@endsection --}}

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Companies') }}</h1>
                    <div class="row my-3">
                        <div class="col-md-8">
                            @include('partials._search')
                        </div>
                        <div class="col-md-auto p-3 p-md-0">
                            <a href="/companies/add" class="btn btn-success">Add Company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content company">
        <div class="container-fluid">
            <div class="d-flex flex-wrap results">
                @unless(count($companies) == 0)
                @foreach ($companies as $company)
                <div class="cardContainer">
                    <x-company-card :company="$company"/>
                </div>
                @endforeach
                @else
                    <div class="d-flex flex-column text-center">
                        <img src="images/empty-box.png" alt="" style="max-width: 150px; margin:0 auto">
                        <h4 class="font-weight-bold mt-4">No companies found</h4>
                        <p>Click <a href="/companies/add"><b>Add Company</b></a> button to get started.</p>
                    </div>
                @endunless
            </div>
              <div class="my-4">
                {{$companies->links()}}
              </div>
        </div>
    </div>
@endsection

@section('scripts')

    @if(Session::has('success'))
        <script defer>
            var toastMixin = Swal.mixin({
                toast: true,
                icon: 'success',
                title: 'Action success!',
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 2500,
                width: '28em',
                timerProgressBar: true,
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
