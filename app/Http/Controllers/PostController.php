<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(){
        
        $user = auth()->user();
        $posts = Post::paginate(20);
        //$posts = $this->postRepository->findByUser($user);
        
        return view('posts.index', compact('posts'));
    }

    public function show(){

    }

    public function store(PostRequest $request){
        $user = auth()->user();
        $post = $request->validated();
        $this->postRepository->store($user, $post);
        return redirect()->route('posts.index');

    }

    public function edit($id){
        $post = $this->postRepository->findById($id);
        return view('posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request){
        $data = $request->validated();
        $this->postRepository->update($id, $data);
        return redirect()->route('posts.index');
    }   

    public function destroy($id){
        $this->postRepository->destroy($id);
        return redirect()->route('posts.index');
    }
    
}
