@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Categories Data</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col"><a href="#">Add</a></th>
            </tr>
        </thead>
        <tbody>
            @php ($no = 1)
            @foreach ($categorydata as $category)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$category->category}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td><a href="#">Edit</a> | <a href="#">Del</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection