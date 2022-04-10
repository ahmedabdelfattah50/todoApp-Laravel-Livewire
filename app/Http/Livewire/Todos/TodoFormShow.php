<?php

namespace App\Http\Livewire\Todos;

use App\Todo;
use Livewire\Component;

class TodoFormShow extends Component
{
    public $todoTitle;
    public $todoDescription;
    public $todoId;
    public $formAction;
    public $todoCompletion;
    public $messageAction = "EWEREWRWERWErwe";

    protected $listeners = [
        'getTodoId'
    ];

    // ####### the function which get the id to the todos liveWire controller #######
    public function getTodoId($todoId,$formAction){
        $this->todoId = $todoId;
        $this->formAction = $formAction;

        $todo = Todo::find($this->todoId);

        $this->todoCompletion = $todo->completed;
        $this->todoDescription = $todo->description;
        $this->todoTitle = $todo->title;
    }

    // ####### this function used to clear the variables from current data #######
    public function clearVars(){
        $this->todoTitle = null;
        $this->todoDescription = null;
        $this->todoId = null;
        $this->formAction = null;
        $this->todoCompletion = null;
    }

    // ####### this function used to go custom blade page in the front-End #######
    public function render()
    {
        return view('livewire.todos.todo-form-show');
    }
}
