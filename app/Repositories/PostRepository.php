<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository{

    private $post;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function findByUser($user){
        return $posts = $this->post->where('user_id', $user->id)->orderBy('updated_at', 'ASC')->get();
    }

    public function findById($id){
        return $this->post->where('id', $id)->firstOrFail();
    }
    
    public function all(){
        return  $this->post->orderBy('updated_at', 'ASC')->get();

    }
    
    public function store($user, $post){
        
        $user->posts()->create($post);
    }

    public function update($id, $data){
        $post = $this->findById($id);
        $post->update($data);
    }

    public function destroy($id){
        $post = $this->findById($id);
        $post->delete();
    }
}