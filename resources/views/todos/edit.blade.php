@extends('layouts.app')
    @section('title', 'Edit Todo')

    @section('content')
    <div class="container">
        
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 50%">
                <div class="card-header">
                    <h1 class="text-center mt-3">Edit Todo</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('updateTodo',$todo->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Todo Title</label>
                          <input type="text" name="todoTitle" class="form-control @error('todoTitle') is-invalid @enderror" value="{{$todo->title}}">
                        </div>
                        @error('todoTitle')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                          <label for="exampleInputPassword1">Todo Description</label>
                          <textarea class="form-control  @error('todoDescription') is-invalid @enderror" name="todoDescription" rows="3">{{$todo->description}}</textarea>
                        </div>
                        @error('todoDescription')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    @endsection