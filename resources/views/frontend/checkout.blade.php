@extends('layouts.front')

@section('title')
checkout
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Firsst Name</label>
                                <input type="text" name="fname" value="{{Auth::user()->name}}" class="form-control firstname" placeholder="Enter first name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="firstname">Last Name</label>
                                <input type="text" name="lname"  class="form-control lastname" placeholder="Enter last name">
                                <span id="lname_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Email</label>
                                <input type="text" name="email"  value="{{Auth::user()->email}}" class="form-control email" placeholder="Enter email">
                                <span id="email_error" class="text-danger"></span>
                                
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Phone Number</label>
                                <input type="text" name="phone" class="form-control phone" placeholder="Enter phone number">
                                <span id="phone_error" class="text-danger"></span>
                                
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Address1</label>
                                <input type="text" name="address1"class="form-control address1" placeholder="Enter Address1">
                                <span id="address1_error" class="text-danger"></span>
                                
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">Address2</label>
                                <input type="text" name="address2" class="form-control address2" placeholder="Enter Address2">
                                <span id="address2_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">City</label>
                                <input type="text" name="city" class="form-control city" placeholder="Choose your City">
                                <span id="city_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">State</label>
                                <input type="text" name="state" class="form-control state" placeholder="Choose state">
                                <span id="state_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">country</label>
                                <input type="text" name="country" class="form-control country" placeholder="Choose country">
                                <span id="country_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="firstname">pincode</label>
                                <input type="text" name="pincode" class="form-control pincode" placeholder="Choose pincode">
                                <span id="pincode_error" class="text-danger"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                    <table class="table table-striped table-bordered">
                        
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                        @foreach($cartitems as $item)
                        <tbody>
                        <tr>

                            <td>{{$item->products->name}}</td>
                            <td>{{$item->prod_qty}}</td>
                            <td>{{$item->products->selling_price}}</td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-success float-end w-100 mt-3">Place Order</button>
                    <button type="button" class="btn btn-primary float-end w-100 mt-3 razorpay_btn">Razor Pay</button>
                    </div>
                </div>
            </div> 
        </div>
    </form>
</div>
@endsection