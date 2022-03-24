@extends('layouts.default')

@section('content')
    @include('partials.message')

    <form method="POST" action="{{ route('save_comment') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="email1">Тема</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" id="email1"
                           placeholder="Тема" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email1">Оптсание</label>
                <div class="col-sm-9">
                    <input type="text" name="description" class="form-control" id="email1"
                           placeholder="Оптсание" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="fname">Файл</label>
                <div class="col-sm-9">
                    <input name="file" type="file" class="form-control" id="fname"
                           placeholder="Файл" required>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
@endsection