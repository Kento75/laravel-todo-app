<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    // 記事一覧ページ
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    // 記事詳細ページ
    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    // 記事投稿フォームページ
    public function create()
    {
        return view('todos.create');
    }

    // 記事投稿
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required | min:6 | max:12',
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todo created successfully.');

        // 記事一覧ページへリダイレクト
        return redirect('/todos');
    }

    // 記事更新フォームページ
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    // 記事更新
    public function update(Todo $todo)
    {
        $this->validate(request(), [
            'name' => 'required | min:6 | max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully.');

        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully.');

        return redirect('/todos');
    }
}
