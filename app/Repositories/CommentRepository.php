<?php

namespace App\Repositories;

use App\Jobs\SendMailJob;
use App\Comment;

class CommentRepository
{
    public function prepareData($request)
    {
        try {
            $file = $request->file('file');

            $this->saveFile($file);

            $message = $request->except('file');

            $this->sendMail($message, $file);

            $this->saveComment($file, $message);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function saveFile($file)
    {
        $file->move(public_path('/uploads/'), $file->getClientOriginalName());
    }

    public function sendMail($message, $file)
    {
        $path = public_path('/unloads/').$file->getClientOriginalName();

        dispatch(new SendMailJob($message, $path, auth()->user()));
    }

    public function saveComment($file, $message)
    {
        Comment::create([
            'file'        => $file->getClientOriginalName(),
            'title'       => $message['title'],
            'description' => $message['description'],
            'user_id'     => auth()->user()->id,
        ]);
    }

    public function getAll()
    {
        return Comment::get();
    }

    public function updateStatus($comment)
    {
        $comment->is_answered = 1;
        $comment->save();
    }
}