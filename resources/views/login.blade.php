
@extends('app.master')
@section('title' , 'Login')


@section('content')
    @include('includes.messages')
        <form action="/login" method="POST" style="display: flex;justify-content: center;">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Your Email">
            </div>
            <div>
                <input type="password" name="password" placeholder="Your Password">
            </div>
            <div>
                <input type="submit" value="LOG IN">
            </div>
        </form>


