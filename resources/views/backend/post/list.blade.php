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
<a href="{{route('posts.showFavorite')}}">Favorite List({{session()->has('bookmark') ? count(session()->get('bookmark')) : ""}})</a>
{{--{{ $posts->links() }}--}}
<div class="col-5">
{{--    <form action="">--}}
{{--        <input type="text" id="search" class="form-control">--}}
{{--    </form>--}}
</div>

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
    @foreach($posts as $key => $post)
        <tr>
            <td>{{$key + 1}}</td>
{{--            <td>{{$post->id}}</td>--}}
            <td>{{$post->title}}</td>
            <td>
                @if(count($post->categories) > 0)
                    @foreach($post->categories as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                @else
                    <p>Chưa phân loại</p>
                @endif
            </td>
            <td>{{$post->user->name}}</td>
            <td><a href="{{route('posts.edit',$post->id)}}"><i class="fas fa-pen-alt"></i></a></td>
            <td><a href="{{route('posts.show',$post->id)}}"><i class="fas fa-info"></i> </a></td>
            <td><a onclick="return confirm('Are you sure ???')" href="{{ route('posts.destroy',$post->id) }}"><i class="fas fa-calendar-times"></i></a></td>
            <td><a href="{{route('posts.addToFavorite', $post->id)}}"><i class="fas fa-heart"></i></a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
@endsection
