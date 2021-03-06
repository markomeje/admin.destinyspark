<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        return view('authors.index', ['title' => 'Articles', 'authors' => Author::simplePaginate(10)]);
    }
}
