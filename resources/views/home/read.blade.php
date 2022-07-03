@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="card h-100">
        <img src="{{url('uploads/')}}/{{$content->picture}}" class="card-img-top" alt="{{$content->title}}" height="100%">
        <div class="card-body">
            <h5 class="card-title">{{$content->title}}</h5>
            <p class="card-text">{!!$content->content!!} </p>
        </div>
        <div class="card-footer">
            <small class="text-muted">{{$content->updated_at}}</small>
        </div>
    </div>
</div>
@endsection