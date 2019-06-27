<?php

namespace App\Repositories;

use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class BookRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Book';
    }

    public function search($queryStr)
    {
        $book_ids = DB::table('books as b')
                        ->join('author_book as ab', 'ab.book_id', '=', 'b.id')
                        ->join('authors as a', 'a.id', '=', 'ab.author_id')
                        ->select('b.id')
                        ->where('b.name', 'like', '%' . $queryStr. '%')
                        ->orWhere('a.name', 'like', '%' . $queryStr. '%')
                        ->orWhere('b.udk', '=', $queryStr)
                        ->orWhere('b.bbk', '=', $queryStr)
                        ->get()
                        ->pluck('id');

        return $this->model->whereIn('id', $book_ids);
    }
}