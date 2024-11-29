@extends('layout')

@section('content')
    <h1 class="text-xl font-bold text-blue mb-4">Add New Game</h1>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" 
                   class="w-full px-4 py-2 border rounded" value="{{ old('title') }}">
            <!-- @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
        </div>
        <div>
            <label for="genre" class="block text-gray-700">Genre</label>
            <input type="text" name="genre" id="genre" 
                   class="w-full px-4 py-2 border rounded" value="{{ old('genre') }}">
            <!-- @error('genre')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
        </div>
        <div>
            <label for="platform" class="block text-gray-700">Platform</label>
            <input type="text" name="platform" id="platform" 
                   class="w-full px-4 py-2 border rounded" value="{{ old('platform') }}">
            <!-- @error('platform')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
        </div>
        <div>
            <label for="developer" class="block text-gray-700">Developer</label>
            <input type="text" name="developer" id="developer" 
                   class="w-full px-4 py-2 border rounded" value="{{ old('developer') }}">
            <!-- @error('platform')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
        </div>
        <div>
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" name="price" id="price" 
                   class="w-full px-4 py-2 border rounded" value="{{ old('price') }}">
            <!-- @error('price')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold">Upload Image</label>
            <input type="file" name="image" id="image" class="border border-gray-300 p-2 w-full rounded">
            <!-- @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror -->
        </div>
        <button type="submit" 
                class="bg-orange text-white px-4 py-2 rounded hover:bg-orange-600">
            Save
        </button>
    </form>
@endsection
