@extends('layouts.default')

@section('content')
    @include('partials.message')
    <div>
        <a href="{{ route('manager') }}">Назад</a>
    </div>

    <table>
        <ul>
            <li>{{ $comment->title }}</li>
            <li>{{ $comment->description }}</li>
            <li><a href="{{ $comment->pathToFile() }}" download>Скачать</a></li>
            <li>{{ $comment->user->name }}</li>
            <li>{{ $comment->user->email }}</li>
            <li><a href="{{ route('update_status_comment', ['comment' => $comment->id]) }}">Обновить статус</a></li>
        </ul>
    </table>
@endsection