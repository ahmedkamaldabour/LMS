<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CommentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CommentInterface;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function index(CommentDataTable $commentDataTable)
    {
        return $this->commentInterface->index($commentDataTable);
    }

    public function show(Comment $comment)
    {
        return $this->commentInterface->show($comment);
    }

    public function changeStatus(Comment $comment)
    {
        return $this->commentInterface->changeStatus($comment);
    }

    public function destroy(Comment $comment)
    {
        return $this->commentInterface->destroy($comment);
    }
}
