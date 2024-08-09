@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold">Edit Todo</h1>
    <form action="{{ route('todos.update', $todo) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $todo->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $todo->description) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Todo</button>
        <a href="{{ route('todos.index') }}" class="ml-4 text-blue-500">Back to List</a>
    </form>
</div>
@endsection
