<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\PostInterface;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Comment;
use App\Models\Post;

class PostController extends Controller
{
   private $postInterface;
   public function __construct(PostInterface $post)
   {
       $this->postInterface = $post;
   }
    public function index(PostDataTable $datatable)
    {
        return $this->postInterface->index($datatable);
    }

    public function create()
    {
        return $this->postInterface->create();
    }

    public function store(PostRequest $request)
    {
        return $this->postInterface->store($request);
    }

    public function edit(Post $post)
    {
       return $this->postInterface->edit($post);
    }

    public function update(PostRequest $request, Post $post)
    {
        return $this->postInterface->update($request , $post);
    }

    public function show(Post $post)
    {
        return $this->postInterface->show($post);
    }

    public function delete(Post $post)
    {
        return $this->postInterface->delete($post);
    }

    public function like(Post $post)
    {
        return $this->postInterface->like($post );
    }

    public function update_status(Comment $comment)
    {
        return $this->postInterface->update_status($comment);
    }
}
