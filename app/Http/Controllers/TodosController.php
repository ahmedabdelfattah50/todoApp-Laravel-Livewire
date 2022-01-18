<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    // ###### get all todos function ######
    public function index(){
        $todos = Todo::all();
        $completedFunctCount = count(Todo::where('completed', true)->get());
        return view('todos.index' , compact('todos', 'completedFunctCount'));
    }

    // ###### get one todo function ######
    public function show($todoID){
        $todo = Todo::find($todoID);
        return view('todos.show')->with('todos',$todo);
    }

    // ###### create todo function ######
    public function create(){
        return view('todos.create');    // go to create form page
    }

    // ###### store one todo function ######
    public function store(Request $request){

        $this->validate($request,[
            'todoTitle' => 'required',
            'todoDescription' => 'required'
        ]);

        $todo = new Todo;   // new object from the Model Todo
        // Assign data of the form
        $todo -> title = $request -> todoTitle;
        $todo -> description = $request -> todoDescription;
        $todo -> save();        // save the todo in the database

        // success message
        $request->session()->flash('warning',"Todo '$todo->title' has been created successfuly");

        return redirect('/todos');
    }

    // ###### edit todo function ######
    public function edit(Todo $todo){
        return view('todos.edit')->with('todo',$todo);
    }

    // ###### update todo function ######
    public function update(Request $request, Todo $todo){
        $this->validate($request,[
            'todoTitle' => 'required',
            'todoDescription' => 'required'
        ]);

        $todo -> title = $request -> get('todoTitle');
        $todo -> description = $request ->get('todoDescription');
        $todo -> save();        // save the todo in the database after update
        return redirect('todos/' . $todo->id);
    }

    // ###### delete todo function ######
    public function destroy(Todo $todo){
        $todo->delete();

        // success message
        session()->flash('danger',"Todo '$todo->title' has been deleted successfuly");

        return redirect('/todos');
    }

    // ###### complete todo function ######
    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();

        // success message
        session()->flash('success',"Todo '$todo->title' has been completed successfuly");

        return redirect('/todos');
    }

}
