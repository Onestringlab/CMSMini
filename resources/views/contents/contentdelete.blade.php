@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Delete Content Data</h1>
    <form action="../{{$content->id}}" method="post">
        <div class="mb-3 row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                {{ $content->title }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                {{ $content->cat_id }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                {{ $content->content }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
                {{ $content->picture }}
            </div>
        </div>
        <div class="mb-3 row col-sm-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>
    </form>
</div>
@endsection