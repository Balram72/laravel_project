@extends('layouts.app')
    @section('main')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card mt-3 p-3">
                        <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h1 class="text-muted">User Edit #{{ $product->name }}</h1>
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$product->name)  }}" id="exampleInput">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ old('description') }}"  name="description" rows="3">{{ $product->description }}</textarea>
                                    @if($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label"> Old Image</label>
                                <img src="/products/{{ $product->image }}" alt="No Image" class="rounded" width="50%">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                                @if($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                            </div>
                            <button type="submit" class="btn btn-dark float-end">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
          
    
