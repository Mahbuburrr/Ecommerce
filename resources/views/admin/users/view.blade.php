@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
    <div class="card-body">
        <div class="card-header">
            <h4>Users Details
                <a href="{{url('users')}}" class="btn btn-primary btn-sm float-right">Back</a>
            </h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-4 mt-3 ">
                    <label for="first Name">Role</label>
                    <div class="p-2 border">{{$users->role_as == '0'?'users':'admin'}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">First Name</label>
                    <div class="p-2 border">{{$users->name}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Last Name</label>
                    <div class="p-2 border">{{$users->lname}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Email</label>
                    <div class="p-2 border">{{$users->email}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Phone</label>
                    <div class="p-2 border">{{$users->phone}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Address1</label>
                    <div class="p-2 border">{{$users->address1}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Address2</label>
                    <div class="p-2 border">{{$users->address2}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">City</label>
                    <div class="p-2 border">{{$users->city}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">State</label>
                    <div class="p-2 border">{{$users->state}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Country</label>
                    <div class="p-2 border">{{$users->country}}</div>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">Pincode</label>
                    <div class="p-2 border">{{$users->pincode}}</div>
                </div>
            </div>
        </div>
        
    </div>
</div>

        </div>
    </div>
</div>


@endsection