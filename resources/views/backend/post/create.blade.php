@extends('backend.layout.master')
@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    @toastr_css
</head>
<body>
<form method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="title" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
               placeholder="Enter Title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="exampleInputContent">Content</label>
        <input type="content" name="content" class="form-control" id="exampleInputContent" placeholder="Enter Conten"
               value="{{old('content')}}">
    </div>
        <div>
            <label for="exampleInputUser">User</label><br>
            <select name="user_id">
                @foreach(\App\Models\User::all() as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @error('user_id')
            <p style="color: red">{{$message}}</p>
            @enderror
            <hr>
        </div>
    <h3>Danh sách thể loại</h3>
    @foreach($categories as $category)
        <input type="checkbox" name="category[]" value="{{$category->id}}"> {{$category->name}} <br>
    @endforeach
    <br>
    <button type="submit">Thêm bài viết</button>
    <button type="submit"><a href="{{route("posts.index")}}">Quay lại</a></button>

</form>
</body>
@jquery
@toastr_js
@toastr_render
</html>
@endsection
