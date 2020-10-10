<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = DB::table('subcategories')
                        ->join('categories', 'category_id', '=', 'categories.id')
                        ->select('subcategories.*', 'categories.name as categoryName')
                        ->get();
        //dd($subcategories);
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'category' => 'required'
        ]);
        //dd($request->all());
        Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category
        ]);
        notify()->success('Sub Category Created Successfuly');
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = DB::table('subcategories')
                    ->join('categories', 'category_id', '=', 'categories.id')
                    ->select('subcategories.*', 'categories.name as categoryName')
                    ->where('subcategories.id', '=', $id)
                    ->first();
        //dd($categories);
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'category' => 'required'
        ]);
        //dd($request->all());
        Subcategory::find($id)->update([
            'name' => $request->name,
            'category_id' => $request->category
        ]);
        notify()->success('Sub Category Updated Successfuly');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::find($id)->delete();
        return redirect()->route('subcategory.index');
    }
}
