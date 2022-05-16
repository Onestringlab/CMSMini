@extends('../layouts.app')

@section('content')
<div class="container">
    <h1>Create Category Data</h1>
    <form action="../categories" method="post">
        <div class="mb-3 row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input name="category" class="form-control" id="inputCategory">
            </div>
        </div>
        <div class="mb-3 row col-sm-2">
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection