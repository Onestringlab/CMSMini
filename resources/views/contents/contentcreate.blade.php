@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Create Content Data</h1>
    <form action="{{url('/')}}/contents" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category" class="form-control" id="inputCategory">
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}">
                        {{$category->category}}
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input name="title" class="form-control" id="inputTitle" value="{{ old('title')}}">
                @error('title')
                <div class="alert alert-danger">{{ $message}} </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <input name="content" class="form-control" id="inputContent" value="{{ old('content')}}">
                @error('content')
                <div class="alert alert-danger">{{ $message}} </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
                <input name="picture" class="form-control" id="inputPicture" type="file" value="{{ old('picture')}}">
                @error('picture')
                <div class="alert alert-danger">{{ $message}} </div>
                @enderror
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