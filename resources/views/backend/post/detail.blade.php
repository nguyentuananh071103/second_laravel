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
               placeholder="Enter Title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="exampleInputContent">Content</label>
        <input type="content" name="content" class="form-control" id="exampleInputContent" placeholder="Enter Conten"
               value="{{$post->content}}">
    </div>
    <div class="form-group">
        <label for="exampleInputUser">User</label>
        <input type="user" name="user" class="form-control" id="exampleInputUser" placeholder="Enter User"
               value="{{$post->user->name}}">
    </div>
    <h3>Danh sách thể loại</h3>
    @foreach($categories as $category)
        <input type="checkbox" {{$post->checkCategory($category->id)?"checked":""}} name="category[]"
               value="{{$category->id}}"> {{$category->name}} <br>
    @endforeach
    <br>
    <button type="submit"><a href="{{route('posts.index')}}">Back</a></button>
</form>
</body>
@jquery
@toastr_js
@toastr_render
</html>
@endsection
