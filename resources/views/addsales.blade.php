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
            url({{ URL::asset('image/sale.jpg')}});
        }
    </style>

    <section>
        <div class="container">
            <div class="row">

            <!-- ADD SALES PERSON CARD  -->
            
                <h1 class="text-center text-white mt-3">Add Sales Person</h1>
                <div class="card p-4 mt-3 col-md-6 offset-md-3 shadow p-3 mb-3 bg-white rounded">

                    <form action="{{route('sales.add')}}" novalidate enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter Name</label>
                            <input type="text" name="name" class="form-control name">
                            @error('name')
                            <small id="usercheck" style="color: red;">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Email</label>
                            <input type="text" name="email" class="form-control email">
                            @error('email')
                            <small id="emailcheck" style="color: red;">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Enter Password</label>
                            <input type="password" name="password" class="form-control password">
                            @error('password')
                            <small id="passcheck" style="color: red;">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Male" name="gender"
                                    id="flexRadioDefault1">
                                <label class="form-check-label mr-5" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Female" name="gender"
                                    id="flexRadioDefault2">
                                <label class="form-check-label mr-5" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                            @error('gender')
                            <small id="gendercheck" style="color: red;">
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
                        <div class="form-group">
                            <label for="phone">Enter Phone</label>
                            <input type="text" name="phone" class="form-control phone">
                            @error('phone')
                            <small id="phonecheck" style="color: red;">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Add Person" class="btn btn-primary mt-3">
                            <a href="/admin/home" class="mt-4">Goback</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection