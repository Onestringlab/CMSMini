@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Delete Category Data</h1>
    <form action="{{url('/')}}/categories/{{$category->id}}" method="post">
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                {{$category->category}}
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                @csrf
                @method('DELETE')
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </form>
</div>
@endsection