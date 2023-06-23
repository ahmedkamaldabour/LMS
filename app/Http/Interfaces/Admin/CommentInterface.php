<?php

namespace App\Http\Interfaces\Admin;

interface CommentInterface
{
    public function index($commentDataTable);

    public function show($comment);

    public function changeStatus($comment);

    public function destroy($comment);
}
