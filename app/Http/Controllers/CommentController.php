<?php

namespace App\Http\Controllers;

use App\Modules\Comment;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    /**
     * Show the page comment.
     *
     * @param Comment $comment
     */
    public function comment(Comment $comment)
    {
        return view('pages.comment', compact('comment'));
    }

    /**
     * Update comment column is_answered
     *
     * @param Comment $comment
     * @param CommentRepository $repository
     *
     */
    public function updateStatusComment(Comment $comment, CommentRepository $repository)
    {
        $repository->updateStatus($comment);

        return back()->with('message', 'Данные отправлено');
    }
}
