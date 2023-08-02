<?php

namespace App\Http\Controllers;

use App\Models\advertiser;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertiser = advertiser::all();
        return view('Ads.advertiser',compact('advertiser'));
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
            'advertiser_name'       =>  'required|string|unique:advertisers',
            'description'           =>  'string|max:191',
        ],
    );

        advertiser::create($data);
        session()->flash('Add', 'تم اضافة معلن بنجاح ');
        return redirect('/advertiser');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(advertiser $advertiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(advertiser $advertiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $data = $request->validate([
            'advertiser_name'     =>  'required|max:255|unique:advertisers,advertiser_name,'.$id,
            'description'       =>  'string|max:191'
        ]);

        advertiser::where('id', $id)->update($data);
        session()->flash('edit','تم تعديل معلن بنجاج');
        return redirect('/advertiser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = advertiser::findOrfail($id);
        $category->delete();
        session()->flash('delete','تم حذف معلن بنجاح');
        return redirect('/advertiser');
    }
}
