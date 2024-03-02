<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path('images/category'),$image_name);
            $image_path='images/category/'.$image_name;
        }
        $category=Category::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'shortDescription'=>$request->shortDescription,
            'description'=>$request->description,
            'image'=>$image_path ?? null,
        ]);
        if ($category) {
          $notification=array(
            'message'=>'Kategori Başarıyla Eklendi',
            'alert-type'=>'success'
        );
        }
        else{
            $notification=array(
                'message'=>'Bir Hata Oluştu',
                'alert-type'=>'error');
        }

        return redirect()->route('category.index')->with($notification);
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
        $category=Category::findorfail($id);
        return view('admin.category.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::findorfail($id);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path('images/category'),$image_name);
            $image_path='images/category/'.$image_name;
        };

        $category->update([
            'name'=>$request->name,
            'date'=>$request->date,
            'shortDescription'=>$request->shortDescription,
            'description'=>$request->description,
            'image'=>$image_path ?? null,
        ]);
        $notification=array(
            'message'=>'Kategori Başarıyla Güncellendi',
            'alert-type'=>'warning'
        );
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=CAtegory::findorfail($id);
        unlink($category->image);
        $category->delete();
        return redirect()->route('category.index')->with();
    }
}
