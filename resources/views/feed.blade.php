@extends('app.master')

@include('includes.messages')

<h1>Welcome {{Auth::user()->name}}</h1>
@foreach($products as $product)
    <div>
        <ul style="list-style: none">
            <li style="">Id: {{$product->id}}</li>
            <li>Name: {{$product->name}}</li>
            <li>User Name: {{$product->user->name}}</li>
            <li>Price: {{$product->price}}</li>
            <li>Created At: {{$product->created_at}}</li>
        </ul>
    </div>
    <hr>
@endforeach
