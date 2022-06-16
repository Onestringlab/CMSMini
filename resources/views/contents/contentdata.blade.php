@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Content Data</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col" width="400px">Content</th>
                <th scope="col">Picture</th>
                <th scope="col">Updated At</th>
                <th scope="col"><a href="contents/create"><i class="bi bi-plus-square"></i></a></th>
            </tr>
        </thead>
        <tbody>
            @php ($no = 1)
            @foreach ($contentdata as $content)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$content->title}}</td>
                <td>{{$content->getCategory['category']}}</td>
                <td>{{$content->content}}</td>
                <td>
                    <img src="{{url('/uploads/')}}/{{$content->picture}}" width="120px">
                </td>
                <td>{{$content->updated_at}}</td>
                <td><a href="contents/{{$content->id}}/edit"><i class="bi bi-pencil-square"></i></a> |
                    <a href="contents/{{$content->id}}"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection