@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Update Content Data</h1>
    <form action="../contents/{{$content->id}}" method="post">
        <div class="mb-3 row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input name="title" class="form-control" id="inputTitle" value="{{ $content->title }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input name="category" class="form-control" id="inputCategory" value="{{ $content->cat_id }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <input name="content" class="form-control" id="inputContent" value="{{ $content->content }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
                <input name="picture" class="form-control" id="inputPicture" value="{{ $content->picture }}">
            </div>
        </div>
        <div class="mb-3 row col-sm-2">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection