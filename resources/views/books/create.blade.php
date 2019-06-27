@extends('layouts.app')

@section('title')
    Добавить книгу
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['books.store'], 'method' => 'post', 'class' => 'form-horizontal']) }}
            {{ Form::bsText('name', 'Наименование', old('name'), ['required' => 'required']) }}
            {{ Form::bsSelect2('authors[]', 'Авторы', '/api/authors', 'name',
                '', ['multiple' => 'multiple', 'required' => 'required'], 'id') }}
            {{ Form::bsText('udk', 'УДК', old('udk'), ['required' => 'required']) }}
            {{ Form::bsText('bbk', 'ББК', old('bbk'), ['required' => 'required']) }}
            {{ Form::bsDate('published_at', 'Дата публикации', old('published_at'), ['required' => 'required']) }}
            {{ Form::bsText('publish_place', 'Место публикации', old('published_at')) }}
            {{ Form::bsTextArea('annotation', 'Аннотация', old('annotation')) }}
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection