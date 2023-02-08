@props(['company'])

<div class="company card">
    <div class="card-header bg-white mb-2">
        <img class="companyLogo" src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.svg')}}" alt="">
        <p class="text-right m-0 pt-2">{{$company->updated_at->diffForHumans()}}</p>
    </div>
    <div class="card-body pt-5">
        <h3 class="font-weight-bold">{{$company->name}}</h3>
        <p class="m-0"><b>Email:</b> {{$company->email}}</p>
        <p><b>Website:</b> {{$company->website}}</p>
    </div>
    <div class="card-footer d-flex no-wrap">
        <a href="/companies/{{$company->id}}" class="btn btn-info w-100"><i class="fas fa-info-circle"></i> Details</a>
        <a href="/companies/{{$company->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>

        <form method="POST" action="/companies/{{$company->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>
