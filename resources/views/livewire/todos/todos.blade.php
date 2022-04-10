@section('stylesTodosPage')
    <style>
        .page-link {
            color: #085765;
        }
        .page-item.active .page-link {
            background-color: #085765;
            border-color: #085765;
        }
        @media (max-width: 575.98px) {
            .createdAtSpan {
                display: none;
                color: red;
            }
        }
    </style>
@endsection
<div>
    {{-- ####### The modal of View and Edit form ####### --}}
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    @livewire('todos.todo-form-show')
            </div>
        </div>
    </div>
    {{-- ####### The modal of create form ####### --}}
    <div class="modal fade" id="modalFormCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @livewire('todos.todo-form-create')
            </div>
        </div>
    </div>
    {{-- ####### The modal of edit form ####### --}}
    <div class="modal fade" id="modalFormEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @livewire('todos.todo-form-edit')
            </div>
        </div>
    </div>
    {{-- ####### The modal of delete todoItem ####### --}}
    <div class="modal fade" id="modalDeleteTodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Todo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="todoDeleteForm">
                        <p>Do Realy want to delete this todo?</p>
                        <div>
                            <button wire:click="delete()" class="btn btn-danger">yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ####### The todos table ####### --}}
    <div class="row justify-content-center">
        <div class="card" style="width: 100%">
            <div class="card-header text-center">
                <h2 style="color: #085765" class="mb-0">My Todos <i class="fas fa-clipboard-list-check"></i></h2>
            </div>
            <div class="card-body">
                <button type="button" data-toggle="modal" data-target="#modalFormCreate" data-whatever="@getbootstrap" class="btn btn-info mb-3">Create New Todo <i class="fas fa-plus"></i></button>
                <div>
                    <p class="badge badge-warning">Total todos : {{ $todosCount }}</p>
                    <p class="badge badge-success">completed : {{ $completedTodosCount }}</p>
                    <p class="badge badge-danger">uncompleted : {{ $todosCount - $completedTodosCount }}</p>
                </div>
                <div class="progress" style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $completedTodosPercentage }}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">{{ $completedTodosPercentage }}%</div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ 100 - $completedTodosPercentage }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">{{ 100 - $completedTodosPercentage }}%</div>
                </div>
                <ul class="list-group mb-2" id="allTodosList">
                    @forelse ($todos as $todo)
                        <li class="list-group-item text-muted d-flex justify-content-between" style="border-top-right-radius: 0 !important; border-top-left-radius: 0 !important;">
                            <div>
                                @if ($todo->completed)
                                    <span class="mr-2" >
                                        <a wire:click="selectItem({{ $todo->id }}, 'complete')" style="text-decoration: none; color: #6c757d; cursor: pointer">
                                            <i class="fas fa-check-square"></i>
                                        </a>
                                    </span>
                                @else
                                    <span class="mr-2" >
                                        <a wire:click="selectItem({{ $todo->id }}, 'complete')"  style="text-decoration: none; color: rgb(230, 77, 31); cursor: pointer">
                                            <i class="fas fa-check-square"></i>
                                        </a>
                                    </span>
                                @endif
                                <span style="tr">
                                    @if($todo->completed)
                                        <del>{{ $todo->title }}</del>
                                    @else
                                        {{ $todo->title }}
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="float-right">
                                    <a wire:click="selectItem({{ $todo->id }}, 'delete')" style="color: rgb(216, 11, 11); cursor: pointer">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a wire:click="selectItem({{ $todo->id }}, 'update')" style="color: rgb(17, 160, 17); cursor: pointer">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2" >
                                    <a wire:click="selectItem({{ $todo->id }}, 'show')" style="color: rgb(45, 159, 194); cursor: pointer">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </span>
                                <span class="mr-4 createdAtSpan">
                                    {{$todo->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </li>
                    @empty
                        <p class="alert alert-danger"><i class="fas fa-sad-tear"></i> No Todos Founded</p>
                    @endforelse
                </ul>
                {{ $todos->links() }}
            </div>
        </div>
    </div>
</div>
