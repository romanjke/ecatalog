@extends('layouts.app')

@section('content')
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
                    <p>Список книг пуст</p>
                @endforelse
            </tbody>
        </table>
        {{ $books->links() }}
    @endcomponent
@endsection
