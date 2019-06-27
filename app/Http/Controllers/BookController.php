<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BookRepository;
use App\Book;

class BookController extends Controller
{
    private $books;

    /**
     * BookController constructor.
     *
     * @param BookRepository $book
     */
    public function __construct(BookRepository $books)
    {
        $this->books = $books;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->books->orderBy('id', 'desc')->paginate();

        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $this->validateInput($request);

        $book = Book::create([
            'name' => $request->name,
            'udk' => $request->udk,
            'bbk' => $request->bbk,
            'published_at' => $request->published_at,
            'publish_place' => $request->publish_place,
            'annotation' => $request->annotation
        ]);

        $book->authors()->attach($request->authors);

        return redirect(route('books.index'))->with('success', 'Книга успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();
        $book->authors()->detach();

        return redirect(route('books.index'))->with('success', 'Книга успешно удалена!');
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'authors' => 'required|array|min:1',
            'authors.*' => 'required|integer|exists:authors,id',
            'udk' => 'required',
            'bbk' => 'required',
            'published_at' => 'required|date',
            'publish_place' => 'nullable',
            'annotation' => 'nullable'
        ]);
    }
}
