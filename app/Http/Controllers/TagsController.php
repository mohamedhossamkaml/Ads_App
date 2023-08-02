<?php

namespace App\Http\Controllers;

use App\Models\tags;
use App\Models\category;

use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tags::all();
        return view('Ads.tags',compact('tags'));
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
            'tags_name'     =>  'required|string|unique:tags',
            'description'   =>  'string|max:191',
        ],
    );

        tags::create($data);
        session()->flash('Add', 'تم اضافة الاشارة بنجاح ');
        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tags $tags)
    {

        $id = $request->id;
        $data = $request->validate([
            'tags_name'     =>  'required|max:255|unique:tags,tags_name,'.$id,
            'description'   =>  'string|max:191'
        ]);


        tags::where('id', $id)->update($data);
        session()->flash('edit','تم تعديل الاشارة بنجاج');
        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = tags::findOrfail($id);
        $category->delete();
        session()->flash('delete','تم حذف الاشارة بنجاح');
        return redirect('/tags');
    }
}
