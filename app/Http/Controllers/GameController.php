<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'genre' => 'required|max:25',
            'platform' => 'required|max:20',
            'developer' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Save to storage/app/public/images
            $validated['image'] = $imagePath;
        }

        Game::create($validated);

        return redirect()->route('games.index')->with('success', 'Game created successfully!');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        // Validate input, including image
        $validated = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
            'platform' => 'required|max:255',
            'developer' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($game->image && Storage::disk('public')->exists($game->image)) {
                Storage::disk('public')->delete($game->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        // Update the game with validated data
        $game->update($validated);

        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
