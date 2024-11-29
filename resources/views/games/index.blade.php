@extends('layout')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-blue">Game List</h1>
        <a href="{{ route('games.create') }}" 
           class="bg-orange text-white px-4 py-2 rounded hover:bg-orange-600">
           Add New Game
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-blue text-white">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Genre</th>
                <th class="border border-gray-300 px-4 py-2">Platform</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
                <tr class="odd:bg-gray-100 even:bg-white">
                    <td class="border border-gray-300 px-4 py-2">{{ $game->title }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $game->genre }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $game->platform }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-between">
                        <a href="{{ route('games.show', $game) }}" 
                           class="text-blue hover:underline">View</a>
                        <a href="{{ route('games.edit', $game) }}" 
                           class="text-orange hover:underline">Edit</a>
                        <form action="{{ route('games.destroy', $game) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
