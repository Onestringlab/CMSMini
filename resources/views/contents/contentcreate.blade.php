@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Create Content Data</h1>
    <form action="../contents" method="post">
        <div class="mb-3 row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input name="title" class="form-control" id="inputTitle">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input name="category" class="form-control" id="inputCategory">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <input name="content" class="form-control" id="inputContent">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
                <input name="picture" class="form-control" id="inputPicture">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                @csrf
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection