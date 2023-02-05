@props(['company'])

<div class="company card">
    <div class="card-header">
      <img src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.svg')}}" alt="">
      <p>{{$company->name}}</p>
      {{-- <div class="card-tools"> --}}
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        {{-- <span class="badge badge-primary">Label</span>
      </div> --}}
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>{{$company->email}}</p>
        <p>{{$company->website}}</p>
    </div>
    <!-- /.card-body -->
    <div class="card-footer d-flex">
        <a href="/companies/{{$company->id}}" class="btn btn-success"><i class="fas fa-users"></i> Employees</a>
        <a href="/companies/{{$company->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>

        <form  method="POST" action="/companies/{{$company->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </form>
    </div>
    <!-- /.card-footer -->
</div>
