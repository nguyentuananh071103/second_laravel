@extends('backend.layout.master')
@section('content')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="name" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                   placeholder="Enter Name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email"
                   value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPasword">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password"
                   value="{{ $user->password }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="submit" class="btn btn-outline-primary"><a href="{{route("users.index") }}">Back</a></button>
    </form>
@endsection
