@extends('layouts.app')

@section('content')
<style>
        body{
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-image: linear-gradient(
                     rgba(20,20,20, .9), 
                     rgba(20,20,20, .3)),url({{ URL::asset('image/adminback.jpg') }});
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-header text-white text-center">{{ __('Add Product') }}</div>

                <div class="card-body d-flex justify-content-center">
                   <a href="/addproduct" class="btn btn-info">Click Here</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-secondary">
                <div class="card-header text-white text-center">{{ __('View Report of Sales') }}</div>

                <div class="card-body d-flex justify-content-center">
                   <a href="/statics" class="btn btn-danger">Click Here</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-header text-white text-center">{{ __('Add Sales Person') }}</div>

                <div class="card-body d-flex justify-content-center">
                   <a href="/addsales" class="btn btn-info">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
