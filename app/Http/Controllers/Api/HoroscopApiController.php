<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horoscope;

class HoroscopApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horoscope=Horoscope::with(['category','comments'])->get();
        $data=[
            'data'=>$horoscope,
        ];
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $horoscope=Horoscope::findorfail($id)->with('category','comments')->first();
        $data=[
            'data'=>$horoscope,
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
