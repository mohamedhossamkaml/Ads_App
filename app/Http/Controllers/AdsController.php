<?php

namespace App\Http\Controllers;

use App\Models\ads;
use App\Models\advertiser;
use App\Models\category;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsed=  ads::all();
        return view('Ads.Ads',compact('adsed'));
    }

    // Get products name by category
    public function getproducts($id)
    {
        $states = DB::table('products')->where('category_id', $id)->pluck('products_name', 'id');
        return json_encode($states);
    }


    public function getAdsTags($id) {
        $adsT = ads::find($id);
        $tags = $adsT->tags;

        $ads = ads::where('id',$id)->get();
        $tag = tags::all();
        return view('Ads.ads_Tags',compact('ads' , 'tag','tags'));
    }

    public function adsTags(Request $request) {
        $adsT = ads::find($request->id);
        if (!$adsT) {
            return abort('404');
        }else{
            $adsT->tags()->sync($request->tags_id);
        }
        session()->flash('Add', 'تم اضافة الاعلان بنجاح ');
        return back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = category::all();
        $advertiser  = advertiser::all();
        return view('Ads.add_Ads', compact('categories',  'advertiser'));
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
                'type' => 'required|string|max:255' ,
                'title' => 'required|string|max:191',
                'description' => 'string|max:255',
                'start_date' => 'date',
                'products' => 'string|max:191',
                'advertiser_id'  => 'required|numeric' ,
                'category_id'  => 'required|numeric' ,
            ]);
        $data['user_id'] = auth()->user()->id;


        ads::create($data);
        session()->flash('Add', 'تم اضافة الاعلان بنجاح ');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads=ads::where('id' , $id)->first();
        $categories  = category::all();
        $advertiser  = advertiser::all();
        return view('Ads.edit_Ads', compact('ads', 'categories',  'advertiser'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ads $ads)
    {
        $data_id = $request->id;
        $data = $request->validate([
            'type' => 'string|max:255' ,
            'title' => 'required|max:255|string|unique:ads,title,'.$data_id,
            'description' => 'string|max:255',
            'start_date' => 'date',
            'products' => 'string|max:191',
            'advertiser_id'  => 'numeric' ,
            'category_id'  => 'numeric' ,
        ]);

        ads::where('id', $data_id)->update($data);
        session()->flash('edit','تم تعديل الاعلان بنجاج');
        return redirect('/ads');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $ads = ads::findOrfail($id);
        $ads->delete();
        session()->flash('delete','تم حذف الاعلان بنجاح');
        return redirect('/ads');
    }
}
