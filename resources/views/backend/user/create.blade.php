@extends('backend.layout.master')
@section('content')
<form method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="name" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
               placeholder="Enter Name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email"
               value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="exampleInputPasword">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password"
               value="{{old('password')}}">
    </div>
        <button type="submit">Add New User</button>
    <button type="submit"><a href="{{route("users.index") }}">Back</a></button>
</form>
@endsection
