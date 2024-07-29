<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:movies,title'],
            'image_url' => ['required', 'url'],
            'published_year' => ['required', 'integer', 'min:1888', 'max:' . date('Y')],
            'is_showing' => ['required', 'boolean'],
            'description' => ['required', 'string']
        ]);
        Movie::create($validated);
        return redirect()->route('movie.create');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:movies,title'],
            'image_url' => ['required', 'url'],
            'published_year' => ['required', 'integer', 'min:1888', 'max:' . date('Y')],
            'is_showing' => ['required', 'boolean'],
            'description' => ['required', 'string']
        ]);
        $post = Movie::find($id);
        $post->update($request->all());
        return redirect()->route('movie.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Movie::find($id);
        $ids = Movie::all()->pluck('id')->toArray();
        if (!(in_array($id, $ids)))
        {
            abort(404);
        }
        $post->delete();
        return redirect()->route('movie.index')->with('success', 'Post deleted successfully');
    }
}