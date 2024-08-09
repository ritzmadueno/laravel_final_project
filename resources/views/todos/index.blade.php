@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold">Todo List</h1>
    <a href="{{ route('todos.create') }}" class="text-blue-500">Create New Todo</a>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif
    <ul class="list-disc mt-4">
        @foreach($todos as $todo)
            <li class="mt-2">
                <a href="{{ route('todos.show', $todo) }}" class="text-blue-500">{{ $todo->title }}</a>
                <a href="{{ route('todos.edit', $todo) }}" class="text-yellow-500 ml-4">Edit</a>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline-block ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection