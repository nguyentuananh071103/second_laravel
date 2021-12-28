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
<table class="table table-bordered" border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>User</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            {{--            <td>{{$post->content}}</td>--}}
            <td>
                @if(count($post->categories))
                    @foreach($post->categories as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                @else
                    <p>Chưa phân loại</p>
                @endif
            </td>
            <td>{{$post->user->name}}</td>
            <td><a href="{{route('posts.edit',$post->id)}}">Update</a></td>
            <td><a href="{{route('posts.show',$post->id)}}">Detail</a></td>
            <td><a onclick="return confirm('Are you sure ???')" href="{{ route('posts.destroy',$post->id) }}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
@endsection
