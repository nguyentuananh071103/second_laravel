@extends('backend.layout.master')
@section('content')
@if($errors->any())
{{--{{dd($errors)}}--}}
@endif
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif
</script>
<form method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="title" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
               placeholder="Enter Title" value="{{old('title')}}">
        @error('title')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputContent">Content</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="Enter Content" value="{{old('content')}}" rows="5" ></textarea>
        @error('content')
        <p style="color: red">{{$message}}</p>
        @enderror
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
@endsection
