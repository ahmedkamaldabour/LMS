<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CommentInterface;

class CommentRepository implements CommentInterface
{

    public function index($commentDataTable)
    {
        return $commentDataTable->render('Admin.pages.blog.comment.index');
    }

    public function show($comment)
    {
        $post = $comment->post;
        return view('Admin.pages.blog.comment.show', compact('comment', 'post'));
    }

    public function changeStatus($comment)
    {
        $comment->update([
            'status' => !$comment->status
        ]);
        toast(__('comment.comment_status_changed'), 'success');
        return redirect()->back();
    }

    public function destroy($comment)
    {
        $comment->delete();
        toast(__('comment.comment_deleted_successfully'), 'success');
        return redirect()->route('admin.comments.index');
    }
}
