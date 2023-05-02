@extends('layouts.front')

@section('title',$product->name)

   



@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections/{{$product->category->name}}/{{$product->name}} </h6>
    </div>

</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">

                    {{$product->name}}
                    @if($product->trending=='1')
                    <label for="trend" style="font-size:10px;" class="float-end badge bg-danger trending_tag">Trending</label>
                   @endif
                    </h2>
                    <hr>
                    <label for="" class="me-3">Original Price:<s>Rs{{$product->original_price}}</s></label>
                    <label for="" class="fw-bold">Selling Price: Rs {{$product->selling_price}}</label>
                    <p class="mt-3">

                    {!! $product->small_description !!}

                    </p>
                    <hr>
                    @if($product->qty > 0)
                    <label for="" class="badge bg-success">To stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif

                    <div class="row mt-2">
                                <div class="col-md-2">
                                    <input type="hidden" value="{{$product->id}}" class="prod_id">
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                        <span class="input-group-text decrement-btn">-</span>
                                        <input type="text" name="quantity " value="1" class="form-control text-center qty-input"/>
                                        <span class="input-group-text increment-btn">+</span>

                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <br/>
                                    @if($product->qty>0)
                                    <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                    @endif
                                    <button type="button" class="btn btn-success addToWishlist me-3 float-start">Add to wishlist <i class="fa fa-heart"></i></button>
                                   

                                </div>
                     </div>  
                 </div>
              </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $product->description !!}
                </p>
            </div>
           
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        // $('.addToCartBtn').click(function(e){
        //         e.preventDefault();

        //         var product_id=$(this).closest('.product_data').find('.prod_id').val();
        //         var product_qty=$(this).closest('.product_data').find('.qty-input').val();



        //         //    alert(product_id);
        //         $.ajaxSetup({
        //                     headers: {
        //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                     }
        //                 });

        //         $.ajax({

        //             method:"POST",
        //             url:"{{url('add-to-cart')}}",
        //             data:{
        //                 'product_id':product_id,
        //                 'product_qty':product_qty,
        //             },
        //             success:function(response){

        //         swal(response.status);
        //             }
        //         });

        // });

        $('.increment-btn').click(function(e){

            e.preventDefault();
            // var inc_value=$('.qty-input').val();
            var inc_value=$(this).closest('.product_data').find('.qty-input').val();
            var value=parseInt(inc_value,10);
            value=isNaN(value) ? 0 : value;
            if(value<10)
            {

                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e){

                e.preventDefault();
                var dec_value=$(this).closest('.product_data').find('.qty-input').val();
                var value=parseInt(dec_value,10);
                value=isNaN(value) ? 0 : value;
                if(value>1)
                {

                    value--;
                    $(this).closest('.product_data').find('.qty-input').val();
                }
         });

         
    });

    

    
</script>
@endsection