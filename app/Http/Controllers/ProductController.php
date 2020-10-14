<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                    ->join('categories', 'category_id', '=', 'categories.id')
                    ->join('subcategories', 'subcategory_id', '=', 'subcategories.id')
                    ->select('products.*', 'subcategories.name as subcategoryName', 'categories.name as categoryName')
                    ->get();
        //dd($products);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
            'price' => 'required|integer|min:0',
            'additional_info' => 'required',
            'category' => 'required'
        ]);
        $image = $request->file('image')->store('public/files');
        //dd($image);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'additional_info' => $request->additional_info,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'image' => $image
        ]);
        notify()->success('Product Created Successfuly');
        return redirect()->route('product.index');
        //dd($request);
    }

    public function show(Category $category)
    {
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'description' => 'required',
            'price' => 'required|integer|min:0',
            'additional_info' => 'required',
            'category' => 'required'
        ]);
        $product = Product::find($id);
        $image = $product->image;
        if($request->file('image')){
            \Illuminate\Support\Facades\Storage::delete($image);
            $image = $request->file('image')->store('public/files');
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->additional_info = $request->additional_info;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->image = $image;
        $product->save();
        notify()->success('Product Updated Successfuly');
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        $file = $product->image;
        $product->delete();
        \Illuminate\Support\Facades\Storage::delete($file);
        notify()->success('Product Deleted Successfuly');
        return redirect()->route('product.index');
    }
}
