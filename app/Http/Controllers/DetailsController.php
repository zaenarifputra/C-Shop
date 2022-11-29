<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Details;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = details::all();
        return $details;
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
        $details = new details();
        $details->name_brand = $request->input('name_brand');
        $details->stock = $request->input('stock');
        $details->description = $request->input('description');
        $details->save();

        return response()->json([
            'status' => 201,
            'data' => $details
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = details::find($id);
        if($details) {
            return response()->json([
                'status' => 200,
                'data' => $details
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $details = details::find($id);
        if($details){
            $details->name_brand = $request->name_brand ? $request->name_brand : $details->name_brand;
            $details->stock = $request->stock ? $request->stock : $details->stock;
            $details->description = $request->description ? $request->description : $details->description;
            $details->save();
            return response()->json([
                'status' => 200,
                'data' => $details
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = details::where('id', $id)->first();
        if($details){
            $details->delete();
            return response()->json([
                'status'=>200,
                'data' => $details
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
