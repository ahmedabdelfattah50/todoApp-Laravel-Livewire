<?php

namespace App\Http\Livewire\Todos;

use App\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Todos extends Component
{
    // ####### this to use the pagination in the table of the data #######
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectId;
    public $selectAction;
    public $messageAction = "EWEREWRWERWErwe";

    protected $listeners = [
      'refreshTodosParent' => '$refresh'
    ];

    // ####### this function used to select the (id and action) of the method with the todoItem #######
    public function selectItem($selectId, $selectAction) {
        $this->selectId = $selectId;
        $this->selectAction = $selectAction;

        if($selectAction == 'delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        } elseif ($selectAction == 'complete') {
            $this->complete($this->selectId);
        } elseif ($selectAction == 'show') {
            $this->emit('getTodoId', $this->selectId, $this->selectAction);
            $this->dispatchBrowserEvent('openModal');
        } else {
            // ####### call the function of getTodoId to get the ID of the todoItem to upadate it #######
            $this->emit('getTodoId', $this->selectId, $this->selectAction);
            $this->dispatchBrowserEvent('openModalEdit');
        }
    }

    // ####### this function used to make the todoItem to be completed #######
    public function complete($todoId){
        $todo = Todo::find($todoId);

        if($todo->completed == false ){
            $todo->completed = true;
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => 'Congratulations! <i class="fas fa-trophy-alt"></i> the Todo has been completed successfully']);
            $todo->save();
        } else {
            $todo->completed = false;
            $todo->save();
        }
        notify()->success('Laravel Notify is awesome!');
    }

    // ####### this function used to delete the todoItem from the database #######
    public function delete(){
        $todo = Todo::find($this->selectId);
        if ($todo){
            $todo->delete();
        }
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'The Todo has been deleted successfully!!']);
    }

    // ####### this function used to go custom blade page in the front-End #######
    public function render()
    {
        $totalUserTodosAll = Todo::where('user_id', Auth::user()->id)->get();
        $totalUserTodos = Todo::where('user_id', Auth::user()->id)->paginate(6);
        $todosCount = count($totalUserTodosAll);

        if($todosCount != 0){
            $completedTodosCount = count(Todo::where(['user_id' => Auth::user()->id, 'completed' => true])->get());
            $completedTodosPercentage = round(($completedTodosCount/$todosCount)*100);
        } else {
            $completedTodosCount = 0;
            $completedTodosPercentage = 0;
        }

        return view('livewire.todos.todos', [
            'todos' => $totalUserTodos,
            'todosCount' => $todosCount,
            'completedTodosCount' => $completedTodosCount,
            'completedTodosPercentage' => $completedTodosPercentage
        ]);
    }
}
