@extends('layout')

@section('content')
    <h1 class="text-xl font-bold text-blue mb-4">{{ $game->title }}</h1>

    <div class="space-y-4">
        @if ($game->image)
            <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" class="w-64 h-64 object-cover mb-4">
        @endif
        <p><strong class="text-gray-700">Genre:</strong> {{ $game->genre }}</p>
        <p><strong class="text-gray-700">Platform:</strong> {{ $game->platform }}</p>
        <p><strong class="text-gray-700">Developer:</strong> {{ $game->developer }}</p>
        <p><strong class="text-gray-700">Price:</strong> ${{ $game->price }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('games.edit', $game) }}" 
           class="bg-orange text-white px-4 py-2 rounded hover:bg-orange-600">
           Edit Game
        </a>
        <form action="{{ route('games.destroy', $game) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800">
                Delete Game
            </button>
        </form>
    </div>
@endsection
