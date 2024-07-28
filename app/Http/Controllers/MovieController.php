<?php

namespace App\Http\Controllers;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('getMovie', ['movies' => $movies]);
    }

    public function admin_index()
    {
        $movies = Movie::all();
        return view('admin_index', ['movies' => $movies]);
    }
}