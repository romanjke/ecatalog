@extends('layouts.app')

@section('title')
    Редактировать
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['books.update', $book], 'method' => 'put', 'class' => 'form-horizontal']) }}
            {{ Form::bsText('name', 'Наименование', $book->name, ['required' => 'required']) }}
            {{ Form::bsSelect2('authors[]', 'Авторы', '/api/authors', 'name',
                '', ['required' => 'required', 'multiple' => 'multiple'], 'id') }}
            {{ Form::bsText('udk', 'УДК', $book->udk, ['required' => 'required']) }}
            {{ Form::bsText('bbk', 'ББК', $book->bbk, ['required' => 'required']) }}
            {{ Form::bsDate('published_at', 'Дата публикации', $book->published_at, ['required' => 'required']) }}
            {{ Form::bsText('publish_place', 'Место публикации', $book->publish_place) }}
            {{ Form::bsTextArea('annotation', 'Аннотация', $book->annotation) }}
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection