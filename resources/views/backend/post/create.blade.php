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
{{--@if($errors->any())--}}
{{--{{dd($errors)}}--}}
{{--@endif--}}
<form action="" method="post">
    @csrf
    <input type="text" name="title" placeholder="Tiêu đề" value="{{old('title')}}">
    @error('title')
    <p style="color: red">{{$message}}</p>
    @enderror
    <input type="text" name="content" placeholder="Nội dung" value="{{old('content')}}">
    @error('content')
    <p style="color: red">{{$message}}</p>
    @enderror

    <select name="user_id">
        @foreach(\App\Models\User::all() as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    @error('user_id')
    <p style="color: red">{{$message}}</p>
    @enderror
    <hr>
    <h3>Danh sách thể loại</h3>
    @foreach($categories as $category)
    <input type="checkbox" name="category[]" value="{{$category->id}}"> {{$category->name}} <br>
    @endforeach
    <br>
    <button type="submit">Thêm bài viết</button>
    <a href="{{route("posts.index")}}">Quay lại</a>
</form>
</body>
</html>
