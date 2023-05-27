@extends('layouts.front')

@section('title')

Welcome to E-Shop
@endsection

@section('content')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
        <h2>Featured Products</h2>
        <div class="owl-carousel owl-theme">

            @foreach($featured_products as $product )
                    <div class="item">
                    <a href="{{url('category/'.$product->slug)}}">
                        <div class="card">
                            <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="product-image">
                                <div class="card-body">
                                    <h5>{{$product->name}}</h5>
                                    <span class=""float-start>{{$product->selling_price}}</span>
                                    <span class="float-end"><s>{{$product->original_price}}</s></span>
                                </div>

                        </div>
                        </a>
                    </div>
                
            @endforeach
    
        </div>
            

        <!-- @foreach($featured_products as $product )
            <div class="col-md-3 mt-3">
            <a href="{{url('category/'.$product->slug)}}">
                <div class="card">
                    <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="product-image">
                        <div class="card-body">
                            <h5>{{$product->name}}</h5>
                            <span class=""float-start>{{$product->selling_price}}</span>
                            <span class="float-end"><s>{{$product->original_price}}</s></span>
                        </div>

                </div>
                </a>
            </div>
            
        @endforeach -->
    </div>
</div>

<div class="py-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2>Trending Categories</h2>
            <div class="row">
            @foreach($trending_category as $category )
            <div class="col-md-3 mt-3">
                <a href="{{url('view-category/'.$category->slug)}}">
                <div class="card">
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="product-image">
                    <div class="card-body">
                        <h5>{{$category->name}}</h5>
                       <p>
                        {{$category->description}}
                       </p>
                    </div>
                </div>
                </a>
            </div>
            
            @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection
