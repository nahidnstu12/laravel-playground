<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products.index")->with("products",$products);
    }
    public function create(Request $request)
    {
        $product = Product::create($request->all());
        return Response::json($product);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category = $request->category;

        $product->save();
        return Response::json($product);
    }
    public function destroy(Request $request,$id)
    {
        $product = Product::destroy($id);
        return Response::json($product);
    }
}