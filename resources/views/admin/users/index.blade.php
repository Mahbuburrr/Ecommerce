@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-header">
            <h4>Category Page</h4>
            <hr>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>                    
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($users as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name.' '.$item->lname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                
                <td>
                    
                    <a href="{{url('view-user/'.$item->id)}}" class="btn btn-primary btn-sm">view</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection