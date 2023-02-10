@props(['company'])

<div class="company card">
    <div class="card-header bg-white mb-2">
        <div class="imageContainer">
            <img class="companyLogo" src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.svg')}}" alt="">
        </div>
        <p class="text-right m-0 pt-2">{{$company->updated_at->diffForHumans()}}</p>
    </div>
    <div class="card-body pt-5 mb-3">
        <h3 class="font-weight-bold textContainer">{{$company->name}}</h3>
        <div class="textContainer">
            <b>Email:</b> {{$company->email}}
        </div>
        <div class="textContainer">
            <b>Website:</b> {{$company->website}}
        </div>
    </div>
    <div class="px-3 pb-3 d-flex no-wrap">
        <a href="/companies/{{$company->id}}" class="btn btn-primary w-100"><i class="fas fa-users"></i> Employees</a>
        <a href="/companies/{{$company->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>

        <form method="POST" action="/companies/{{$company->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger show_confirm"><i class="fas fa-trash"></i></button>
        </form>
    </div>
</div>

