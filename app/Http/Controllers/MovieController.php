<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        // デバッグ用ログ
        \Log::info('Request data: ', $request->all());

        $movies = Movie::query();
        $keyword = $request->input('keyword');
        $is_showing = $request->input('is_showing');

        // デバッグ用ログ
        \Log::info('Keyword: ' . $keyword);
        \Log::info('Is Showing: ' . $is_showing);

        if (!empty($keyword)) {
            $movies = $movies->where(function($query) use ($keyword) {
                $query->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%");
            });
        }

        if ($is_showing !== null && $is_showing != 2) {
            $movies = $movies->where('is_showing', '=', $is_showing);
        }

        // デバッグ用ログ
        \Log::info('SQL Query: ' . $movies->toSql());
        \Log::info('SQL Bindings: ', $movies->getBindings());

        $movies = $movies->paginate(20);

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