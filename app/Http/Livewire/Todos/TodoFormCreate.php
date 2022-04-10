<?php

namespace App\Http\Livewire\Todos;

use App\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoFormCreate extends Component
{
    public $todoTitle;
    public $todoDescription;

    // ####### the function which updated automatically when enter of input field #######
    public function updated($todoTitle){
        $this->validateOnly($todoTitle,[
            'todoTitle' => 'max:20'
        ]);
    }

    // ####### the create function which set data of the todos on the database #######
    public function create(){
        $this->validate([
            'todoTitle' => 'required|max:20',
            'todoDescription' => 'required',
        ]);
        $data = [
            'title' => $this->todoTitle,
            'description' => $this->todoDescription,
            'user_id' => Auth::user()->id
        ];
        Todo::create($data);
        $this->emit('refreshTodosParent');
        $this->dispatchBrowserEvent('closeModalCreate');
        $this->clearVars();

        // ####### the success message fot toast #######
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'New Todo has been added successfully <i class="fas fa-grin-beam"></i>']);
    }

    // ####### this function used to clear the variables from current data #######
    public function clearVars(){
        $this->todoTitle = null;
        $this->todoDescription = null;
    }

    // ####### this function used to go custom blade page in the front-End #######
    public function render()
    {
        return view('livewire.todos.todo-form-create');
    }
}
