@extends('layout')

@section('content')
<div>
    <h1>User Register Page</h1>
    <div class="col-sm-8">
    <form method="post" action="register">
        @csrf
        <div class="mb-3">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="text" name="email" class="form-control" placeholder="Enter Email">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter password">
        </div>
        <div class="mb-3">
          <label>Contact</label>
          <input type="text" name="contact" class="form-control" placeholder="Enter contact">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>
@stop