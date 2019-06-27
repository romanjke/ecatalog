@extends('layouts.app')

@section('content')
    <nav class="navbar search">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <div class="collapse navbar-collapse" id="search-navbar-collapse">
                {{ Form::open(['route' => 'books.index', 'method' => 'get', 'class' => 'navbar-form navbar-right']) }}

                    <div class="pull-left">
                        {{ Form::text('q', '', array_merge(['class' => 'form-control'], ['placeholder' => 'Поиск'])) }}
                    </div>

                    <div class="pull-right form-group text-center">
                        {{ Form::submit('Найти', ['class' => 'btn btn-primary']) }}

{{--                        <a href="{{ route('books.index') }}" class="btn btn-default">Сбросить</a>--}}
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </nav>

    @component('components.panel')
        @can('create', 'App\Book')
            <div class='mb-2 pull-right'>
                <a href="{{ route('books.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Добавить книгу
                </a>
            </div>
        @endcan
        <table class='table'>
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Авторы</th>
                    <th>Дата публикации</th>
                    <th>Классификация (УДК, ББК)</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>
                            @foreach($book->authors as $author)
                                {{ $author->name }}<br>
                            @endforeach
                        </td>
                        <td>{{ $book->published_at->format('d.m.Y') }}</td>
                        <td>{{ $book->udk }} <br> {{ $book->bbk }}</td>
                        <th>
                            @can('update', $book)
                                <a href="{{ route('books.edit', ['book' => $book]) }}" class='btn btn-primary btn-sm'>
                                    <i class="fas fa-pencil-alt"></i> <span>Редактировать</span>
                                </a>
                            @endcan
                        </th>
                        <th>
                            @can('delete', $book)
                                {{ Form::postLink(['books.destroy', $book], 'delete', 'Удалить',
                                    ['class' => 'btn btn-danger btn-sm'], 'fas fa-trash-alt') }}
                            @endcan
                        </th>
                    </tr>
                @empty
                    <p><strong>Список книг пуст</strong></p>
                @endforelse
            </tbody>
        </table>
        {{ $books->links() }}
    @endcomponent
@endsection
