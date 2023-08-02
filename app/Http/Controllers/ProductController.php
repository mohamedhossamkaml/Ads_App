<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        $products = product::all();
        return view('Ads.products',compact('products' , 'categories'));
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
            'products_name' =>  'required|string|unique:products',
            'category_id'   =>  'required|numeric',
            'description'   =>  'string|max:191',
        ],
    );

    product::create($data);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data_id = $request->pro_id;
        $cat_id = category::where('category_name', $request->category_name)->first()->id;

        $data = $request->validate([
            'products_name' =>  'required|max:255|unique:products,products_name,'.$data_id,
            'category_id'   =>  'numeric',
            'description'   =>  'string|max:191'
        ]);

        $data[ 'category_id'] = $cat_id ;

        product::where('id', $data_id)->update($data);
        session()->flash('edit','تم تعديل المنتج بنجاج');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $product = product::findOrfail($id);
        $product->delete();
        session()->flash('delete','تم حذف المنتج بنجاح');
        return redirect('/products');
    }
}
