@extends('layouts.app')
    @section('main')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <div class="card mt-3 p-3">
                            <form method="POST" action="/products/store" enctype="multipart/form-data">
                                 @csrf
                                 <div class="mb-3">
                                     <label for="exampleInput" class="form-label">Name</label>
                                     <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleInput">
                                     @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                     @endif
                                  </div>
                                  <div class="mb-3">
                                     <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                     <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ old('description') }}"  name="description" rows="3"></textarea>
                                        @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                  </div>
                                  <div class="mb-3">
                                     <label for="formFile" class="form-label">Image</label>
                                     <input class="form-control" name="image" type="file" id="formFile">
                                       @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                  </div>
                                  <button type="submit" class="btn btn-dark float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
