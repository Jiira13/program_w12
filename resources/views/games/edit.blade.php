@extends('layout')

@section('content')
    <h1 class="text-xl font-bold text-blue mb-4">Edit Game</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.update', $game) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" 
                   class="w-full px-4 py-2 border rounded" 
                   value="{{ old('title', $game->title) }}">
        </div>

        <div>
            <label for="genre" class="block text-gray-700">Genre</label>
            <input type="text" name="genre" id="genre" 
                   class="w-full px-4 py-2 border rounded" 
                   value="{{ old('genre', $game->genre) }}">
        </div>

        <div>
            <label for="platform" class="block text-gray-700">Platform</label>
            <input type="text" name="platform" id="platform" 
                   class="w-full px-4 py-2 border rounded" 
                   value="{{ old('platform', $game->platform) }}">
        </div>

        <div>
            <label for="developer" class="block text-gray-700">Developer</label>
            <input type="text" name="developer" id="developer" 
                   class="w-full px-4 py-2 border rounded" 
                   value="{{ old('developer', $game->developer) }}">
        </div>

        <div>
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" step="0.01" name="price" id="price" 
                   class="w-full px-4 py-2 border rounded" 
                   value="{{ old('price', $game->price) }}">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold">Upload New Image</label>
            @if ($game->image)
                <img src="{{ asset('storage/' . $game->image) }}" alt="Current Image" class="w-32 h-32 object-cover mb-2">
            @endif
            <input type="file" name="image" id="image" class="border border-gray-300 p-2 w-full rounded">
            <!-- @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
    </div>

        <button type="submit" 
                class="bg-orange text-white px-4 py-2 rounded hover:bg-orange-600">
            Update Game
        </button>
    </form>
@endsection
