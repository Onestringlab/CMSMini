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
                <th scope="col">
                    <a href="categories/create">
                        <i class="bi bi-plus-square"></i>
                    </a>
                </th>
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
                <td>
                    <a href="categories/{{$category->id}}"><i class="bi bi-pencil-square"></i></a> |
                    <a href="categories/edit/{{$category->id}}"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection