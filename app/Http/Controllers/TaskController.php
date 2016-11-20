<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;

use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'tasks' => Task::all()
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);
        $task = new Task();
        $task->name = $request->get('name');
        $task->content = $request->get('content');
        $task->rank = $request->get('rank');
        $task->notes = $request->get('notes');
        $task->save();
        return $task;
    }
    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        return response()->json(['success']);
    }
    public function show($id) {
        $task = Task::find($id);
        return $task;
    }
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);
        $task = Task::find($id);
        $task->name = $request->get('name');
        $task->content = $request->get('content');
        $task->rank = $request->get('rank');
        $task->notes = $request->get('notes');
        $task->save();
        return $task;
    }
}
