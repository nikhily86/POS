@extends('layouts.app') @section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
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
    </head>
    <body>
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
                   
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {!! $order->links() !!}
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>

@endsection
