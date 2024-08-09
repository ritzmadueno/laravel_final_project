<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
{
    $todos = auth()->user()->todos;
    return view('todos.index', compact('todos'));
}

public function create()
{
    return view('todos.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
    ]);

    auth()->user()->todos()->create($request->all());

    return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
}

public function show(Todo $todo)
{
    $this->authorize('view', $todo);
    return view('todos.show', compact('todo'));
}

public function edit(Todo $todo)
{
    $this->authorize('update', $todo);
    return view('todos.edit', compact('todo'));
}

public function update(Request $request, Todo $todo)
{
    $this->authorize('update', $todo);
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
    ]);

    $todo->update($request->all());

    return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
}

public function destroy(Todo $todo)
{
    $this->authorize('delete', $todo);
    $todo->delete();

    return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
}

}
