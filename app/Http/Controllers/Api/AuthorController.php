<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AuthorRepository;

class AuthorController extends Controller
{
    private $authors;

    public function __construct(AuthorRepository $authors)
    {
        $this->authors = $authors;
    }
    public function all()
    {
        return $this->authors->all();
    }
}
