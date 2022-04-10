@extends('layouts.app')
    @section('title', 'All Todos')

    @section('stylesIndexPage')
        <style>
            img {
                height: 470px;
            }
            @media (max-width: 575.98px) {
                img {
                    height: 320px;
                    width: 320px;
                }
                h1 {
                    font-size: 30px;
                    text-align: center;
                }
            }
        </style>
    @endsection

    @section('content')
        <div class="container">
            @guest
                <div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/images/noteBook.gif') }}" alt="notebook" title="notebook">
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <h1 style="color: #085765">Start Your Journey with us</h1>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('login') }}" style="font-size: 20px; color: #085765" class="p-2">login</a>
                        <span style="font-size: 20px; color: #085765" class="p-2">OR</span>
                        <a href="{{ route('register') }}" style="font-size: 20px; color: #dc3545" class="p-2">Register</a>
                    </div>
                </div>
            @else
                @livewire('todos.todos')
            @endguest
        </div>
    @endsection
