<?php

namespace App\Http\Livewire\Todos;

use App\Todo;
use Livewire\Component;

class TodoFormEdit extends Component
{
    public $todoTitle;
    public $todoDescription;
    public $todoId;
    public $formAction;

    protected $listeners = [
        'getTodoId'
    ];

    // ####### the function which get the id to the todos liveWire controller #######
    public function getTodoId($todoId,$formAction){
        $this->todoId = $todoId;
        $this->formAction = $formAction;
        $todo = Todo::find($this->todoId);
        $this->todoDescription = $todo->description;
        $this->todoTitle = $todo->title;
    }

    // ####### the function which updated automatically when enter of input field #######
    public function updated($todoTitle){
        $this->validateOnly($todoTitle,[
            'todoTitle' => 'max:20'
        ]);
    }

    public function edit($todoId){
        $this->validate([
            'todoTitle' => 'required|max:20',
            'todoDescription' => 'required',
        ]);

        $data = [
            'title' => $this->todoTitle,
            'description' => $this->todoDescription
        ];

        Todo::find($todoId)->update($data);         // update the todoItem after found it
        $this->emit('refreshTodosParent');
        $this->dispatchBrowserEvent('closeModalEdit');
        $this->clearVars();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'The Todo has been updated successfully <i class="fas fa-smile-wink"></i>']);
    }

    // ####### this function used to clear the variables from current data #######
    public function clearVars(){
        $this->todoTitle = null;
        $this->todoDescription = null;
        $this->todoId = null;
        $this->formAction = null;
    }

    // ####### this function used to go custom blade page in the front-End #######
    public function render()
    {
        return view('livewire.todos.todo-form-edit');
    }
}
