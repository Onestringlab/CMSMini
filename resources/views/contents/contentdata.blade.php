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
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col"><a href="contents/create">Add</a></th>
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
                <td>{{$content->picture}}</td>
                <td>{{$content->created_at}}</td>
                <td>{{$content->updated_at}}</td>
                <td><a href="contents/{{$content->id}}">Edit</a> |
                    <a href="contents/edit/{{$content->id}}">Del</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection