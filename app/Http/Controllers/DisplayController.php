<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Jobs\SendEmailJob;

use Event;
use App\Events\SendMail;
class DisplayController extends Controller
{

    //1 get data wiyh join
    public function index()
    {
        $products = Product::select('products.id', 'products.name', 'products.description', 'products.price', 'products.discount', 'categories.name as category_name')
         ->join('categories', 'products.category_id', '=', 'categories.id')
         ->get();

        return view('products.index',['products'=> $products]);
    }
    //2 create 
    public function create(){
        return view('products.create');
    }
    //3 add create 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
        ]);
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->save();
        // $data['email'] = 'vandunayak4000@gmail.com';
        // // dispatch(new SendEmailJob($data));

        // dispatch(new SendEmailJob($data))->delay(now()->addseconds(value:5)); //Bydefault 1 secound hoy 6e
       
       
        //Event::dispatch(new SendMail(5)); ///event call 1st method
        event(new SendMail(5) ); ///event call method 2
        dd('Users subscribed');
        return back()->withSuccess('Product Created !!!!!');
    }
    //4 edit create 
    public function edit($id){
        // dd($id);
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }
    //5 update create
    public function update(Request $request,$id){
        //dd($request->all());
        //dd($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
        ]);
           // dd($request->all());  
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;

        $product->save();
           
        return back()->withSuccess('Product Updated !!!!!');
    }
     //6 delete create
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return back()->withSuccess('Product deleted !!!!!');
    }      
}
