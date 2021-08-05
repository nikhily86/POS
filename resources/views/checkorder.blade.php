@extends('layouts.app')

@section('content')


        <style>
            body {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: linear-gradient(
                        rgba(20, 20, 20, 0.9),
                        rgba(20, 20, 20, 0.3)
                    ),
                    url({{URL::asset("image/check.jpg")}});
            }
        </style>
        <title>Orders!</title>
  
        <div class="container">
            <div class="d-flex justify-content-end my-2">
                <a href="home" class="btn btn-danger">Go Back</a>
            </div>

            <!-- ALL ORDERS TABLE  -->
            
            <table class="table table-striped table-dark">
                <thead class="text-center text-white">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Customer ID</th>
                    </tr>
                </thead>
                <tbody class="text-center text-white">
                @if(!empty($order) && $order->count())
                    @foreach($order as $row) @php $orderdata =
                    json_decode($row->data); @endphp
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $orderdata->pname }}</td>
                        <td>{{ $orderdata->quantity }}</td>
                        <td>{{ $orderdata->price }}</td>
                        <td>{{ $orderdata->cid }}</td>
                    </tr>
                   
                   
                    @endforeach
                @endif
                </tbody>
            </table>
            {!! $order->links() !!}
        </div>

       

@endsection
