@extends('layouts.front')

@section('title')

  my orders

@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                <h4>View Orders
                    <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                </h4>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping Details</h4>
                            <label for="fname">First Name</label>
                            <div class="border p-2">{{$orders->fname}}</div>

                            <label for="fname">Last Name</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for="fname">Orders Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="fname">Orders Phones</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for="shipping Address">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address1}},
                                {{$orders->address3}},
                                {{$orders->city}},
                                {{$orders->state}},
                                {{$orders->country}},

                            </div>
                            <label for="Zip Code">Pin Code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>







                        </div>

                         <div class="col-md-6">

                         <h4 class="py-3">Order Details</h4>

                                <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders->orderitems as $item) 
                                            <tr>
                                                <td>{{$item->products->name}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>
                                                    <img src="{{asset('assets/uploads/products/'.$item->products->image
                                                        )}}" width="50px" alt="">
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>

                                </table>
                                <h4 class="px-2">Grand Total:<span class="float-end">{{$orders->total_price}}</span></h4>
                        </div>
                    
                    </div>

               
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
