<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ProductController extends Controller
{
    public function index(){
        return view('products.index',['products'=> Product::get()]);
    }
    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // validation Data Start
            $request->validate([
                'name'=>'required',
                'description'=>'required',
                'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
            ]);

        // validation Data End


        // dd($request->all());  // Show all data without save database

        // uplode Image Floder Start
             $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
        // uplode Image Floder Start
        // Insert Data Start
            $product  = new Product;
            $product->image = $imageName;
            $product->name = $request->name;        
            $product->description = $request->description;
         
            $product->save();
                return back()->withSuccess('product Created !!!!');
         // Insert Data End   
        // return view('products.create');
    }

    public function edit($id){
            $product = Product::where('id',$id)->first();
            return view('products.edit',['product' => $product]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product = Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }
            $product->name = $request->name;        
            $product->description = $request->description;
            $product->save();
              return back()->withSuccess('product Update !!!!');
    }   
    public function destroy($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('product Delete !!!!');
    }
    public function show($id){
        $product=Product::where('id',$id)->first();
        return view('products.show',['product' => $product]);
    }
}
