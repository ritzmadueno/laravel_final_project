@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold">Todo Details</h1>
    <div class="mt-4">
        <p><strong>Title:</strong> {{ $todo->title }}</p>
        <p><strong>Description:</strong> {{ $todo->description }}</p>
        <a href="{{ route('todos.edit', $todo) }}" class="text-yellow-500 mt-4 inline-block">Edit</a>
        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline-block ml-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
        <a href="{{ route('todos.index') }}" class="text-blue-500 mt-4 inline-block">Back to List</a>
    </div>
</div>
@endsection
