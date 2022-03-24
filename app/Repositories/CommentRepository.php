<?php

namespace App\Repositories;

use App\Jobs\SendMailJob;
use App\Modules\Comment;

class CommentRepository
{
    /**
     * save data and send mail
     *
     * @param  $request
     *
     * return boolean
     */
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

    /**
     * save file
     *
     * @param  $file
     *
     * return void
     */
    public function saveFile($file)
    {
        $file->move(public_path('/uploads/'), $file->getClientOriginalName());
    }

    /**
     * job for send mail to manager
     *
     * @param  $message
     * @param  $file
     *
     * return void
     */
    public function sendMail($message, $file)
    {
        $path = public_path('/unloads/').$file->getClientOriginalName();

        dispatch(new SendMailJob($message, $path, auth()->user()));
    }

    /**
     * save data to Comment model
     *
     * @param  $message
     * @param  $file
     *
     * return void
     */
    public function saveComment($file, $message)
    {
        Comment::create([
            'file'        => $file->getClientOriginalName(),
            'title'       => $message['title'],
            'description' => $message['description'],
            'user_id'     => auth()->user()->id,
        ]);
    }

    /**
     * get all data from Comment model
     *
     * return collection
     */
    public function getAll()
    {
        return Comment::get();
    }

    /**
     * update is_answered
     *
     * return void
     */
    public function updateStatus($comment)
    {
        $comment->is_answered = 1;
        $comment->save();
    }
}