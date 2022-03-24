<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    public function comment(Comment $comment)
    {
        return view('pages.comment', compact('comment'));
    }

    public function updateStatusComment(Comment $comment, CommentRepository $repository)
    {
        $repository->updateStatus($comment);

        return back();
    }
}
