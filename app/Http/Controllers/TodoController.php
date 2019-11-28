<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('Todo.index')->with('todos', Todo::all());
    }
    public function show(Todo $todo)
    {
        return view('Todo.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('Todo.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required|min:10'
        ]);
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        session()->flash('success','Todo Created Successfully');
        return redirect('/index');
    }
    public function edit(Todo $todo)
    {
        return view('Todo.edit')->with('todo', $todo);
    }
    public function update(Todo $todo)
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required|min:10'
        ]);

        $data = request()->all();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success','Todo Updated Successfully');
        return redirect('/index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('success','Todo deleted successfully');
        return redirect('/index');
    }
    public function complete(Todo $todo)
    {
        $todo->completed=true;
        $todo->save();
        session()->flash('success','Todo completed successfully');
        return redirect('/index');
    }
}
