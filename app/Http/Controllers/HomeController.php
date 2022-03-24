<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCommentRequest;
use App\Repositories\CommentRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * send to CommentRepository save data
     *
     * @param SaveCommentRequest $request
     * @param CommentRepository $comment
     *
     */
    public function saveComment(SaveCommentRequest $request, CommentRepository $comment)
    {
        $comment->prepareData($request);

        return back()->with('message', 'Данные отправлено');;
    }

    /**
     * get all data from CommentRepository
     *
     * return collection
     */
    public function manager(CommentRepository $comment)
    {
        $comments = $comment->getAll();

        return view('pages.manager', compact('comments'));
    }

    /**
     * Show the application page client
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function client()
    {
        return view('pages.client');
    }
}
