@extends('layouts.app')
<!-- @include('flash-message') -->

@section('content')
<style>
        body{
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-image: linear-gradient(
                     rgba(20,20,20, .9), 
                     rgba(20,20,20, .3)),url({{ URL::asset('image/home.jpg') }});
        }
    </style>
<div class="container-fluid">

    <div class="row">
    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
        <div class="col-md-4">
             
           <h1 class="text-center text-white">Products</h1>
           <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-white">#</th>
                                    <th class="text-white">Product Name</th>
                                    <th class="text-white">Quantity</th>
                                    <th class="text-white">Price</th>
                                    <th class="text-white">Add</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-white">1</td>
                                    <td>
                                   <select class="form-control" name="product_name" id="product_id">
                                         <option value="Select Type">Select Type</option>
                                         @foreach($products as $row)
                                         <option value="{{$row->name}}">{{ $row->name}}</option>
                                         @endforeach
                                    </select>
                                   </td>
                                   <td style="width:1%">
                                    <input type="number" id="qty" min="0" value="0" class="form-control">
                                   </td>   
                                    <td><p id="price" class="text-white"></p></td>
                                    <input type="hidden" id="namep">
                                    <input type="hidden" id="pid">
                                    <input type="hidden" id="pid1">
                                    <td><button class="btn btn-dark" id="add" data-id="{{ $row-> id}}">Add</button></td> 
                                </tr>
                           
                            </tbody>
            </table>

            <div class="text-center ">
                <a href="/checkOrder" class="btn btn-warning">Check Orders</a>
            </div>
           
        </div>
        <div class="col-md-8">
          <h1 class="text-center text-white">Add Customer</h1>
          <form action="" method="GET">
           @csrf
           <div class="row">
              <div class="col-md-4">
              <label for="cname" class="text-white"> Name:-</label>
                <input type="text" class="ms-3" name="cname" id="cname"> 
                <div class="ms-5 ps-5">
                   <small id="usercheck" style="color: red;" > </small>
                </div>
              </div>
              <div class="col-md-4">
              <label for="cphone" class="text-white"> Phone:-</label>
                <input type="text" name="cphone"  class="ms-3" id="cphone"> 
                <div class="ms-5 ps-5">
                   <small id="phonecheck" style="color: red;" > </small>
                </div>  
              </div>
              <div class="col-md-4">
              <label for="caddress" class="text-white"> Address:-</label>
                <input type="text" name="caddress" id="caddress">  
                <div class="ms-5 ps-5">
                   <small id="addresscheck" style="color: red;" > </small>
                </div>
              </div>
           </div>
           </form>  
              
            <h1 class="text-center my-3 text-white">Bill</h1>
             <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th class="text-white">#</th>
                              <th class="text-white">Product_Name</th>
                              <th class="text-white">Quantity</th>
                              <th class="text-white">Price</th>
                              <th class="text-white">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                        </tbody>
                        <tr class="text-white">
                           <td id="pname" name="pname" class="text-white"> </td>
                           <td id="qty" name="qty" class="text-white"> </td>
                           <td id="price" name="price" class="text-white"> </td>
                           <td class="text-right " >
                                <h5><strong class="text-white">Sub Total:  ₹ </strong></h5>
                                <p><strong class="text-white">Tax (5%) : ₹ </strong></p>
                           </td>
                           <td class="text-center text-white" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-white">
                              <h5><strong>Gross Total: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                               
                           </td>
                        </tr>
                     </table>

                     <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" id="createorder">Create Order</button>
                    </div>
        </div>

        
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" 
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
crossorigin="anonymous"></script>

<script>

$(document).ready(function(){
     $('#product_id').change(function() {
        var name = $(this).val();
         //alert(name);
        $.ajax({
            url: 'get_price/'+name,
            type: 'GET',
            data: {
                "name":name
            },
            success:function(data){
                console.log(data.price);
                console.log(data.name);
                
                
                $('#price').text(data.price);
                $('#namep').val(data.name);
                $('#pid').val(data.id);

            }
        });
       });
   
      
     });
     var count = 1;
     $('#add').on('click',function(){      
        
        var name = $('#product_id').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
        var pid = $('#pid').val();   
 
        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
    
        else
        {
           billFunction(); // Below Function passing here 
        }
        function billFunction()
          {
          var total = 0;
       
          $("#receipt_bill").each(function () {
           var pid = $('#pid').val();
          $.ajax({
                 url: '/checkTable',
                 type: 'POST',
                 data: {
                    "_token": "{{ csrf_token() }}",
                    "pid":pid,
                    "name":name,
                    "qty":qty,
                    "price":price
                 },

                success:function(data){
                    var count = 1;
                    var sum = 0;
                    console.log(data);
                    console.log(data['temps']);
                    console.log(data['subtotals']);
                    console.log(data['Tax']);
                    console.log(data['grosstotal']);
                    $('#subTotal').text(data['subtotals']);
                    $('#taxAmount').text(data['Tax'].toFixed(2));
                    $('#totalPayment').text(data['grosstotal'].toFixed(2));
                    var table = '';
                   jQuery.each(data['temps'], function(i, temp){
                      table += '<tr><td><label style="font-weight:normal" class="text-white">'+ count +'</label></td><td class="pnames text-white" id='+count +'><label style="font-weight:normal" class="pname text-white" value="'+ temp.name +'">'+ temp.name +'</label></td><td><label style="font-weight:normal" class="text-white">' + temp.quantity + '</label></td><td><label style="font-weight:normal" class="pname text-white">' +temp.price+ '</label></td><td><label style="font-weight:normal" class="pname text-white">' +temp.total+ '</label></td></tr>';
                   });
                   $('#new').html(table);
                }
            }); 
        
         });
         count++;
        } 


       });
       
       $("#createorder").click(function () {

  
        var cname = $('#cname').val();
        var cphone = $('#cphone').val();
        var caddress = $('#caddress').val();
        if (cname == "") {
           $("#usercheck").text("Fill Name");
            return false;
        }
        if (cphone == "") {
           $("#phonecheck").text("Fill Phone Correctly");
            return false;
        }

        if (cphone.length > 10) {
           $("#phonecheck").text("Phone Can't be more than 10 Numbers");
            return false;
        }

        if (cphone.length < 6) {
           $("#phonecheck").text("Phone Can't be less than 6 Numbers");
            return false;
        }
        
        if(isNaN(cphone)){
           $("#phonecheck").text("Fill Phone In Number");
           return false;
        }
       
       
        if (caddress == "") {
           $("#addresscheck").text("Fill Address");
            return false;
        }
        if(!isNaN(caddress)){
           $("#addresscheck").text("Address is Wrong");
           return false;
        }

        $.ajax({
            url: 'createCust',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "cname":cname,
                "cphone":cphone,
                "caddress":caddress,
            },
        success:function(data){
                console.log(data.id);  
               alert("Customer Added"); 
                var mainArr = [];
                var tmpArr = [];
                var mainTable = $('#new');
                var tr = mainTable.find('tr');
                var keys = ["id","pname","quantity","price"];
                console.log(keys);
                tr.each(function(){
                    tmpArr=[];
                $(this).find('td').each(function(index, value){
                var values=$(this).find('label').text();
               
                tmpArr.push(values);

                    });
                 mainArr.push(tmpArr);

                    });
 
                 var rowCount = $('#new tr').length;
                 var total = $('#subTotal').text();
                 console.log(total);
                 var cid = data.id;
                 var s  ={
                            "_token": "{{ csrf_token() }}",                  
                            "total":total,
                            "data":mainArr,
                            "cid":cid,
                        };
                  console.log('test =>', s);
             
                    $.ajax({
                        url: 'createOrder',
                        type: 'POST',
                        data: s,

                        success:function(data){
                            console.log(data);
                            $('#cname').val("");
                            $('#cphone').val("");
                            $('#caddress').val("");
                            $('#subTotal').text("");
                            $('#taxAmount').text("");
                            $('#totalPayment').text("");
                            $("#new tr").remove();
                        }
                    }); 
            }
         });
       });
      
</script>
@endsection
