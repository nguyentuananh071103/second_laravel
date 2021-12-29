@extends('backend.layout.master')
@section('content')
<form method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="title" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
               placeholder="Enter Title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="exampleInputContent">Content</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="5" >{!! $post->content !!}</textarea>
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
@endsection
