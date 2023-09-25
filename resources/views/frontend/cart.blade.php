@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">

        <a href="{{url('/')}}">Home

        </a>/
        <a href="{{url('cart')}}">
            Cart
        </a>/
        </h6>
    </div>

</div>

<div class="container my-5">
    <div class="card shadow cartitems ">
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php $total=0; @endphp
            @foreach ($cartitems as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px"  alt="Image here">
                </div>
                <div class="col-md-3 my-auto">
                    <h3>{{$item->products->name}}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>Rs {{$item->products->selling_price}}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value= "{{$item->prod_id}}">
                    @if($item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3">
                        <span class="input-group-text changeQuantity decrement-btn">-</span>
                        <input type="text" name="quantity " value="{{$item->prod_qty}}" class="form-control text-center qty-input"/>
                        <span class="input-group-text changeQuantity increment-btn">+</span>

                    </div>
            @php $total +=$item->products->selling_price * $item->prod_qty ; @endphp

            @else
            <h6  class=" mt-4">out of stock</h6>
                    @endif
                </div>
                <div class="col-md-2 mt-4">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>

            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price {{$total}}
           <a href="{{url('checkout')}}"> <button class="btn btn-outline-success  float-end">

            Proceed to Checkout
            </button></a>
            </h6>
            
        </div>
        @else
        
        <div class="card-body text-center">

        <h2>Your <i class="fa fa-shopping-cart"></i>Cart is empty</h2>
        <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
        </div>
        @endif

    </div>
</div>
@endsection