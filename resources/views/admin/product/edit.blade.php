@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Update Products</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-products/'.$products->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row">

        <div class="col-md-12">
        <select class="form-select">
            <option selected>{{$products->category->name}}</option>
           
        </select>
        </div>
            <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" class="form-control" value="{{$products->name}}" name="name">
            </div>
            <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" class="form-control" value="{{$products->slug}}"  name="slug">
            </div>
            <div class="col-md-12">
                <label for="">Small Description</label>
                <textarea name="small_description"  rows="3" class="form-control">{{$products->small_description}}</textarea>
            </div>

            <div class="col-md-12">
                <label for="">Description</label>
                <textarea name="description"  rows="3" class="form-control">{{$products->description}}</textarea>
            </div>

            <div class="col-md-6">
                <label for="">Original price</label>
                <input type="number" value="{{$products->original_price}}" class="form-control" name="original_price" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Selling price</label>
                <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Tax</label>
                <input type="number" class="form-control" value="{{$products->tax}}" name="tax" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Quantity</label>
                <input type="number" class="form-control" value="{{$products->qty}}" name="qty" placeholder="">
            </div>

            <div class="col-md-6">
                <label for="">Status</label>
                <input type="checkbox"  {{$products->status =='1' ? 'checked':''}} name="status">
            </div>

            <div class="col-md-6">
                <label for="">Trending</label>
                <input type="checkbox" {{$products->trending =='1' ? 'checked':''}} name="trending">
            </div>


            <div class="col-md-12">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" value="{{$products->meta_title}}" class="form-control">
            </div>

            <div class="col-md-12">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords"  rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
            </div>

            <div class="col-md-12">
                <label for="">Meta Description</label>
                <textarea name="meta_description"  rows="3" class="form-control">"{{$products->meta_description}}</textarea>
            </div>

            @if($products->image)
            <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="cate-img" alt="image">
            @endif
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection