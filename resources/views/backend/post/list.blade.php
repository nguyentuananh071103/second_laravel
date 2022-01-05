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
<a href="{{route('posts.showFavorite')}}">Favorite
    List({{session()->has('bookmark') ? count(session()->get('bookmark')) : ""}})</a>
{{--<div class="input-group rounded">--}}
{{--    <form action="{{route('posts.search')}}" method="post">--}}
{{--        @csrf--}}
{{--    <input type="search" name="searchPost" class="col-2" placeholder="Search" aria-label="Search"--}}
{{--           aria-describedby="search-addon"/>--}}
{{--        <span class="input-group-text border-0" id="search-addon">--}}
{{--    <i class="fas fa-search"></i>--}}
{{--  </span>--}}
{{--    </form>--}}
{{--</div>--}}
<nav class="navbar navbar-light bg-light">
    <form class="form-inline" action="{{route('posts.search')}}" method="post">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="searchPost" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<style>
    .bg-light {
        background-color: #f4f7fa !important;
        padding-left: 0px;
    }
</style>

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
            <td><a onclick="return confirm('Are you sure ???')" href="{{ route('posts.destroy',$post->id) }}"><i
                        class="fas fa-calendar-times"></i></a></td>
            <td><a href="{{route('posts.addToFavorite', $post->id)}}"><i class="fas fa-heart"></i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $posts->links() }}
</body>
</html>
@endsection
