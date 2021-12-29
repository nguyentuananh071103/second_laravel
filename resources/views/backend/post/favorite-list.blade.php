<button type="submit"><a href="{{route('posts.index')}}">Back</a></button>
<table border="1px">
    <thead>
    <th>Id</th>
    <th>Title</th>
    <th>Content</th>
    <th>Quantity</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach($favorites as $favorite)
        <tr>
            <td>{{$favorite['id']}}</td>
            <td>{{$favorite['title']}}</td>
            <td>{{$favorite['content']}}</td>
            <td>{{$favorite['quantity']}}</td>
            <td>
                <a href="{{route('posts.deleteFavorites',$favorite['id'])}}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
