<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    // 記事一覧トップ画面
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    // 記事詳細画面
    public function show($todoId)
    {
        return view('todos.show')->with('todo', Todo::find($todoId));
    }
}
