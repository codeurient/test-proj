<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

    public function index()
    {
        return Movie::with('genres')->get();
    }


    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string',
            'poster' => 'required|string',
            'published' => 'required|boolean',
            'genre_ids' => 'required|array', 
            'genre_ids.*' => 'exists:genres,id', 
        ]);

        $posterPath = $request->file('poster') ? $request->file('poster')->store('posters') : 'default_poster.jpg';

       
        $movie = Movie::create([
            'title' => $validated['title'],
            'poster' => $posterPath,
            'published' => false,
        ]);

        
        foreach ($validated['genre_ids'] as $genreId) {
            $movie->genres()->attach($genreId, ['created_at' => now(), 'updated_at' => now()]);
        }

        return response()->json([
            'message' => 'Movie created and genres assigned successfully!',
            'movie' => $movie->load('genres') 
        ]);
    }




   
    public function show($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        return response()->json($movie);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $movie = Movie::findOrFail($id);

      
        $posterPath = $request->file('poster') ? $request->file('poster')->store('posters') : $movie->poster;
        $movie->update([
            'title' => $request->title,
            'poster' => $posterPath,
        ]);

  
        if ($request->has('genre_ids')) {
            $movie->genres()->sync($request->genre_ids);
        }

        return response()->json($movie);
    }


    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json(['message' => 'Movie deleted successfully']);
    }


    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update(['published' => true]);

        return response()->json($movie);
    }
}
