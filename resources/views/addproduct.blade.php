@extends('layouts.app')

@section('content')

    <style>
         /* BACKGROUND IMAGE STYLING */
        body {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            width: 100%;
            background-image: linear-gradient(rgba(20, 20, 20, .9),
                rgba(20, 20, 20, .3)),
            url({{ URL::asset('image/product.jpg')}});
        }
    </style>

  <section>
        <div class="container">
            <div class="row">

            <!-- ADD PRODUCT CARD  -->
            
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

   
@endsection