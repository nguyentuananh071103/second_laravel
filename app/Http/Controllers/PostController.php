<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        return view("backend.post.list",compact("posts"));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view("backend.post.create",compact("categories"));
    }

    public function store(PostRequest $request)
    {
//        $request->validate([
//            "title"=>"require",
//            "content"=>"require",
//        ]);
        $data = $request->only("title","content","user_id");
        $post = Post::create($data);
        $post->categories()->attach($request->category);
        return redirect()->route("posts.index")->with('message','Thêm mới thành công');

    }
    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        return view("backend.post.update",compact("post","categories"));
    }

    public function update(Request $request,$id)
    {
        $data = $request->only("title","content","user_id");
        $post = Post::findOrFail($id);
        $post->update($data);
        $post->categories()->sync($request->category);
        return redirect()->route("posts.index");
    }
    public function show($id)
    {
        $post = $this->postRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        return view("backend.post.detail",compact("post","categories"));
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('posts.index');

    }

    public function addToFavorite($id)
    {
        $post = Post::findOrFail($id);
        $bookmark = session()->get('bookmark') ?? [];
        if (!isset($bookmark[$id])) {
            $bookmark[$id] = array(
                'id'=>$post->id,
                'title'=>$post->title,
                'content'=>$post->content,
                'quantity'=>1
            );
        }else{
            $bookmark[$id]['quantity']++;
        }
        session()->put('bookmark', $bookmark);
        return redirect()->back();

    }

    public function showFavorite()
    {
        $favorites = session()->get('bookmark');
        return view('backend.post.favorite-list', compact('favorites'));
    }

    public function deleteFavorite($id)
    {
        $favorites = session()->get('bookmark');
        if ($favorites[$id]['quantity']>1) {
            $favorites[$id]['quantity'] --;
        }else {
            unset($favorites[$id]);
        }
        session()->put('bookmark', $favorites);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $posts = $this->postRepository->search($request);
        return response()->json($posts);
    }
}
