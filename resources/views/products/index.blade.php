@extends('layouts.app')
    @section('main')
            <div class="container">
                <div class="text-end">
                    <a href="products/create" class="btn btn-dark mt-2" >New Product</a>
                </div>
                <div class="container mt-3">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sno.</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)  
                            <td>{{ $loop->index+1 }}</td>
                            <td><a href="products/{{ $product->id }}/show" class="text-dark link-underline-light">{{ $product->name }}</a></td>
                            <td><img src="products/{{ $product->image }}" alt="No Image" class="rounded-circle" width="30" hight="30"></td>
                            <td>{{ $product->description }}</td>
                            <td> 
                               <a href="products/{{ $product->id }}/edit" class="btn btn-info mt-2" >Edit</a>
                               <a href="products/{{ $product->id }}/delete" class="btn btn-danger mt-2" >Delete(a)</a>
                                <form method="POST" class="d-inline" action="products/{{ $product->id }}/delete">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-outline-danger btn-sm mt-2">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
             </div>
    @endsection
            
 
