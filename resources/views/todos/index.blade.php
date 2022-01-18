@extends('layouts.app')
    @section('title', 'All Todos')

    @section('content')
        <div class="container">
            <div class="row pt-3 justify-content-center">
                <div class="card" style="width: 50%">
                    <div class="card-header text-center">
                        <h2>Your Todos</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{route('createNewTodo')}}" class="btn btn-info mb-3">Create New Todo <i class="fas fa-plus"></i></a>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session()->get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('danger'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session()->get('danger')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{session()->get('warning')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div>
                            <p class="badge badge-warning">Total todos : {{ count($todos) }}</p>
                            <p class="badge badge-success">completed : {{ $completedFunctCount }}</p>
                            <p class="badge badge-danger">uncompleted : {{ count($todos) - $completedFunctCount }}</p>
                        </div>
                        <ul class="list-group">
                            @forelse ($todos as $todo)
                                <li class="list-group-item text-muted">
                                    @if($todo->completed)
                                        <del>{{ $todo->title }}</del>
                                    @else
                                        {{ $todo->title }}
                                    @endif
                                    <span class="float-right">
                                        <a href="{{route('deleteTodo',$todo->id)}}" style="color: rgb(216, 11, 11)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </span>
                                    <span class="float-right mr-2">
                                        <a href="{{route('editTodo',$todo->id)}}" style="color: rgb(17, 160, 17)">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </span>
                                    <span class="float-right mr-2" >
                                        <a href="{{route('todoItem',$todo->id)}}" style="color: rgb(45, 159, 194)">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </span>
                                    @if (! $todo->completed)
                                        <span class="float-right mr-2" >
                                            <a href="{{route('todoComplete',$todo->id)}}" style="color: rgb(230, 77, 31)">
                                                <i class="fas fa-check-square"></i>
                                            </a>
                                        </span>
                                    @endif
                                </li>
                                @empty
                                    <p class="alert alert-danger">No Todos</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection

