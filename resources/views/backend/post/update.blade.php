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
</head>
<body>
{{--<form action="" method="post">--}}

{{--    @csrf--}}
{{--    <input type="text" name="title" placeholder="Tiêu đề" value="{{$post->title}}">--}}
{{--    <input type="text" name="content" placeholder="Nội dung" value="{{$post->content}}">--}}
{{--    <input type="text" name="user_id" placeholder="ID user" value="{{$post->user->name}}">--}}
{{--    <select name="user_id">--}}
{{--        @foreach(\App\Models\User::all() as $user)--}}
{{--            <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <hr>--}}
{{--    <h3>Danh sách thể loại</h3>--}}
{{--    @foreach($categories as $category)--}}
{{--        <input type="checkbox" {{$post->checkCategory($category->id)?"checked":""}} name="category[]" value="{{$category->id}}"> {{$category->name}} <br>--}}
{{--    @endforeach--}}
{{--    <br>--}}
{{--    <button type="submit">Sửa bài viết</button>--}}
{{--    <button type="submit"><a href="{{route("posts.index")}}">Quay lại</a></button>--}}
{{--</form>--}}

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
            <input type="checkbox" {{$post->checkCategory($category->id)?"checked":""}} name="category[]" value="{{$category->id}}"> {{$category->name}} <br>
        @endforeach
    <br>
    <button type="submit">Sửa bài viết</button>
    <button type="submit"><a href="{{route("posts.index")}}">Quay lại</a></button>
</form>
</body>
</html>
@endsection
