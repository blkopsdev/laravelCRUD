<!-- edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> CRUD From Scratch </title>
</head>
<body>
    <div class="container">
        <h2>Edit A Product</h2><br />
        @if ($errors->any())
        <div class=""alert alert-danger>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
        <form action="{{action('ProductController@update', $id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Price:</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>