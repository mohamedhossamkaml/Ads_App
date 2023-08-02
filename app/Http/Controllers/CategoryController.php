<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        return view('Ads.categories',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
                'category_name' =>  'required|string|unique:category',
                'description'   =>  'required|string|max:191',
            ],
        );

        category::create($data);
        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return redirect('/category');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;

        $data = $request->validate([
                'category_name' =>  'required|max:255|unique:category,category_name,'.$id,
                'description'   =>  'required|string|max:191',
            ],
        );

        category::where('id', $id)->update($data);
        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = category::findOrfail($id);
        $category->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/category');
    }
}
