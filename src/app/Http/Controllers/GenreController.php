<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{

    public function list()
    {
        $genres = Genre::orderBy('name', 'asc')->get();

        return view('genres.list', [
            'title' => 'Genres',
            'items' => $genres
        ]);
    }

    public function create()
    {
        return view('genres.form', [
            'title' => 'Add a new genre',
            'genre' => new Genre()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }

    public function edit(Genre $genre)
    {
        return view('genres.form', [
            'title' => 'Edit genre',
            'genre' => $genre
        ]);
    }

    public function update(Genre $genre, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/genres');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}

