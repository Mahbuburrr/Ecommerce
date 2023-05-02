@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Products</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-products')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row">

        <div class="col-md-12">
        <select class="form-select" name="cate_id">
            <option selected>select a Category</option>
            @foreach ($category as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        </div>
            <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="col-md-12">
                <label for="">Small Description</label>
                <textarea name="small_description"  rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-12">
                <label for="">Description</label>
                <textarea name="description"  rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <label for="">Original price</label>
                <input type="number" class="form-control" name="original_price" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Selling price</label>
                <input type="number" class="form-control" name="selling_price" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Tax</label>
                <input type="number" class="form-control" name="tax" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="qty" placeholder="">
            </div>

            <div class="col-md-6">
                <label for="">Status</label>
                <input type="checkbox" name="status">
            </div>

            <div class="col-md-6">
                <label for="">Trending</label>
                <input type="checkbox" name="trending">
            </div>


            <div class="col-md-12">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>

            <div class="col-md-12">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords"  rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-12">
                <label for="">Meta Description</label>
                <textarea name="meta_description"  rows="3" class="form-control"></textarea>
            </div>

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