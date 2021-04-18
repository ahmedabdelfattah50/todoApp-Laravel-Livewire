@extends('layouts.app')
    @section('title', 'Todo - ' . $todos->id)

    @section('content')
    <div class="container">
        <h1 class="text-center mt-3">{{$todos->title}}</h1>
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 50%">
                <div class="card-header">
                    <span>Details</span>
                    <span class="float-right badge badge-{{ boolval($todos->completed) ? 'success' : 'danger'}}">
                        {{ boolval($todos->completed) ? 'Completed' : 'UnCompleted'}}
                    </span>
                </div>
                <div class="card-body">
                    {{$todos->description}}
                </div>
            </div>
        </div>
    </div>
    @endsection
