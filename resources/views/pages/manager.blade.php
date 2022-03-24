@extends('layouts.default')

@section('content')
    <table>
        @foreach($comments as $comment)
            <ul>
                <li>{{ $comment->title }}</li>
                <li>{{ $comment->description }}</li>
                <li><a href="{{ $comment->pathToFile() }}" download>Скачать</a></li>
                <li>{{ $comment->user->name }}</li>
                <li>{{ $comment->user->email }}</li>
                <li>
                    <a href="{{ route('comment', ['comment' => $comment->id]) }}">
                        @if($comment->is_answered)
                            Просмотрено
                        @else
                            Просмотр
                        @endif
                    </a>
                </li>
            </ul>
            <hr/>
        @endforeach
    </table>
@endsection