@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Companies2') }}</h1>
                    <div class="row my-3">
                        <div class="col-md-8">
                             <form type="get" action="{{ route('companies.search') }}">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" name="query" placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-secondary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-auto">
                            <a href="/companies/add" class="btn btn-success">Add Company</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="d-flex flex-wrap">
                @unless(count($companies) == 0)
                @foreach ($companies as $company)
                <div class="mr-3">
                    <x-company-card :company="$company"/>
                </div>
                @endforeach
                @else
                <p>No companies found</p>

                @endunless
            </div>
            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav> --}}
              {{$companies->onEachSide(1)->links()}}
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


@endsection
