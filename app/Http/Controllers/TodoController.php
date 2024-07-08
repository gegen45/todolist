<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    public function index()
    {
        $all_todos = Todo::all()-> sortByDesc('id');

        return view('todolist', ['todos' => $all_todos]);
    }
 
    public function add(Request $request): RedirectResponse
    {
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->status = false;
        $todo->save();

        return redirect('/'); // redirect to the todolist page after saving
    }

    public function update(request $request, $id): RedirectResponse
    {
        $todo = Todo::find($id);
        $todo->status = !$todo->status;
        $todo->save();

        return redirect('/');
    }

    public function delete(request $request, $id): RedirectResponse
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/');
    }
}

