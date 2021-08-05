@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Sales Person</title>
    <style>
        body{
            background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 100%;
                    width: 100%;
                    background-image: linear-gradient(
                     rgba(20,20,20, .5), 
                     rgba(20,20,20, .3)),url({{ URL::asset('image/product.jpg') }});
        }
    </style>
  </head>
  <body>
  <section>
        <div class="container">
            <div class="row">
                <h1 class="text-center text-white mt-3">Add Product</h1>
                <div class="card p-4 mt-3 col-md-6 offset-md-3 shadow p-3 mb-3 bg-white rounded">
                    <form action="{{route('product.add')}}"  enctype="multipart/form-data"  method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control" >
                            @error('name')
                            <small id="usercheck" style="color: red;" >
                               {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Enter Description</label>
                            <input type="text" name="desc" class="form-control" >
                            @error('desc')
                            <small id="usercheck" style="color: red;" >
                               {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Enter Price</label>
                            <input type="text" name="price" class="form-control">
                            @error('price')
                            <small id="usercheck" style="color: red;" >
                               {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Enter Quantity</label>
                            <input type="text" name="quantity" class="form-control">
                            @error('quantity')
                            <small id="usercheck" style="color: red;" >
                               {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Picture</label>
                            <input type="file" class="form-control" name="file" placeholder="Choose file" id="file">
                            @error('file')
                            <small id="filecheck" style="color: red;">
                               {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                          <input type="submit" value="Add Product" class="btn btn-primary mt-3">
                          <a href="/admin/home" class="mt-4">Goback</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
@endsection