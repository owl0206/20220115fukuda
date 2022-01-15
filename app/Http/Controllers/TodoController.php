<?php

namespace App\Http\Controllers;

use App\Models\todo_app;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request){
        $items = todo_app::all();
        return view('todo', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, todo_app::$rules);
        $item = $request->all();
        todo_app::create($item);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $todo_app = todo_app::find($request->id);
        return view('/todo/update', ['item' => $todo_app]);
    }
    public function update(Request $request)
    {
        $this->validate($request, todo_app::$rules);
        $item = $request->all();
        unset($item['_token']);
        todo_app::where('id', $request->id)->update($item);
        return redirect('/');
    }
    public function remove(Request $request)
    {
        $todo_app = todo_app::find($request->id);
        return view('/todo/delete', ['item' => $todo_app]);
    }
    public function delete(Request $request)
    {
        todo_app::find($request->id)->delete();
        return redirect('/');
    }
}
