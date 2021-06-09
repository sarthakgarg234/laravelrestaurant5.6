@extends('layout')

@section('content')
<div  class="col-sm-6">
    <h1>Add New Restaurant</h1>
  
    <form method="post" action="add">
        @csrf
        <div class="mb-3">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="mb-3">
          <label>Email address</label>
          <input type="text" name="email" class="form-control" placeholder="Enter Email">
        </div>
        <div class="mb-3">
          <label>Address</label>
          <input type="text" name="address" class="form-control" placeholder="Enter Address">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@stop