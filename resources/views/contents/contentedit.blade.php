@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Update Content Data</h1>
    <form action="{{url('/')}}/contents/{{$content->id}}" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category" class="form-control" id="inputCategory">
                    @foreach ($categories as $category )
                    @php ($selected = "")
                    @if($content->cat_id == $category->id)
                    @php ($selected = "selected")
                    @endif
                    <option value="{{ $category->id }}" {{$selected}}>
                        {{$category->category}}
                        @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input name="title" class="form-control" id="inputTitle" value="{{ $content->title }}">
                @error('title')
                <div class="alert alert-danger">{{ $message}} </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <input name="content" class="form-control" id="inputContent" value="{{ $content->content }}">
                @error('content')
                <div class="alert alert-danger">{{ $message}} </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
                <input name="picture" class="form-control" id="inputPicture" type="file"><br>
                <img src="{{url('/uploads/')}}/{{$content->picture}}" width="120px">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                @csrf
                @method('PATCH')
                <input type="hidden" name="pic_old" value="{{ $content->picture }}">
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection