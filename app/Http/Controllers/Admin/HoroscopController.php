<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horoscope;
use App\Models\Category;

class HoroscopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $horoscop=Horoscope::with(['category','comments'])->get();
        return view('admin.horoscope.index',compact('horoscop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.horoscope.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path('images/horoscope'),$image_name);
            $image_path='images/horoscope/'.$image_name;
        }
        $horoscop=Horoscope::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'shortDescription'=>$request->shortDescription,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$image_path ?? null,
        ]);
        if ($horoscop) {
          $notification=array(
            'message'=>'Burç Yorumu Başarıyla Eklendi',
            'alert-type'=>'success'
        );
        }
        else{
            $notification=array(
                'message'=>'Bir Hata Oluştu',
                'alert-type'=>'error');
        }

        return redirect()->route('horoscop.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $horoscop=Horoscope::findorfail($id);
        $category=Category::all();
        return view('admin.horoscope.update',compact(['horoscop','category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path('images/horoscope'),$image_name);
            $image_path='images/horoscope/'.$image_name;
        }
        $horoscop=Horoscope::update([
            'name'=>$request->name,
            'date'=>$request->date,
            'shortDescription'=>$request->shortDescription,
            'description'=>$request->description,
            'category_id'=>$request->category_id,

        ]);
        if ($horoscop) {
          $notification=array(
            'message'=>'Burç Yorumu Başarıyla Güncellendi',
            'alert-type'=>'success'
        );
        }
        else{
            $notification=array(
                'message'=>'Bir Hata Oluştu',
                'alert-type'=>'error');
        }

        return redirect()->route('horoscop.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $horoscop=Horoscope::findorfail($id);
        if($horoscop->image){
            unlink($horoscop->image);
        };
        $horoscop->delete();
        return redirect()->route('horoscop.index');
    }
}
