<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function addProduct(Request $req)
    {
        $product = new product;
        $product->TYP_ID = $req->input('TYP_ID');
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $file->move(base_path('\public\products'), $file->getClientOriginalName());
            $product->image =  $file->getClientOriginalName();
        }
        $product->save();
        return $product;
    }

    function list()
    {
        return Product::all()->map(function ($row) {
            $row->image = url('/products/' . $row->image);
            return $row;
        });
    }

    function delete($id)
    {
        $result = Product::where('id', $id)->delete();
        if ($result) {
            return ["result" => "product has been delete"];
        } else {
            return ["result" => "Operation failed"];
        }
    }

    function getProduct($id)
    {
        return Product::find($id);
    }

    function updateProduct($id, Request $req)
    {
        $product = Product::find($id);
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        if ($req->file('file')) {
            $product->file_path = $req->file('file')->store('products');
        }
        $product->save();
        return $product;
    }

    function search($key)
    {
        return Product::where('name', 'Like', "%$key%")->get();
    }
}
