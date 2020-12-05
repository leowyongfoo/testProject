<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
Use Session;

class ProductController extends Controller
{
    //
    public function create(){
        return view('insertProduct');
    }

    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $image=$r->file('product-image');   //step to upload image get the file input
        $image->move('images',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $addProduct=Product::create([    //step 3 bind data
            'id'=>$r->ID, //add on 
            'name'=>$r->name, //fullname from HTML
            'description'=>$r->description,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'image'=>$imageName,
            
        ]);
        Session::flash('success',"Product create succesful!");
        return redirect()->route('showProduct');

        
    }

    public function show(){
        $products=Product::all();
        return view('showProduct')->with('products',$products);
    }

    public function delete($id){
        $products=Product::find($id);
        $products->delete(); //apply delete from categories where id='$id'
        Session::flash('deleted',"Product delete succesful!");
        return redirect()->route('showProduct');
    }

    public function clientView(){
        $products=Product::paginate(3);
        return view('clientView')->with('products',$products);
    }

    public function detail(){
        $products=DB::table('products');
        return view('detail')->with('products',$products);
       
    }

    
}
