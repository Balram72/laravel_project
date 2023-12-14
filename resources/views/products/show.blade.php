@extends('layouts.app')
    @section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-4">
                <div class="card p-3">
                    <p> Name: <b>{{$product->name}}</b></p>
                    <p> Description: <b>{{$product->description}}</b></p>
                    <p>
                        Image : <img src="/products/{{ $product->image }}" alt="No Image" class="rounded" width="50%">
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection