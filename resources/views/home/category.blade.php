@extends('../layouts.app')

@section('content')
<div class="container">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($contents as $content )
        <div class="col">
            <div class="card h-100">
                <img src="{{url('uploads/')}}/{{$content->picture}}" class="card-img-top" alt="{{$content->title}}" height="100%">
                <div class="card-body">
                    <h5 class="card-title">{{$content->title}}</h5>
                    <p class="card-text">{{substr($content->content,0,150)}} ...</p>
                    <p><a href="{{url('/')}}/content/{{$content->id}}">read more</a>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{$content->updated_at}}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection