<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a producting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::all();
        return $product;
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
        $product = new product();
        $product->name_product = $request->input('name_product');
        $product->desc_product = $request->input('desc_product');
        $product->price_product = $request->input('price_product');
        $product->qty_stok = $request->input('qty_stok');
        $product->size_clothes = $request->input('size_clothes');
        $product->color_clothes = $request->input('color_clothes');
        $product->save();

        return response()->json([
            'status' => 201,
            'data' => $product
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
        $product = product::find($id);
        if($product) {
            return response()->json([
                'status' => 200,
                'data' => $product
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
        $product = product::find($id);
        if($product){
            $product->name_product = $request->name_product ? $request->name_product : $product->name_product;
            $product->desc_product = $request->desc_product ? $request->desc_product : $product->desc_product;
            $product->price_product = $request->price_product ? $request->price_product : $product->price_product;
            $product->qty_stok = $request->qty_stok ? $request->qty_stok : $product->qty_stok;
            $product->size_clothes = $request->size_clothes ? $request->size_clothes : $product->size_clothes;
            $product->color_clothes = $request->color_clothes ? $request->color_clothes : $product->color_clothes;
            $product->save();
            return response()->json([
                'status' => 200,
                'data' => $product
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
        $product = product::where('id', $id)->first();
        if($product){
            $product->delete();
            return response()->json([
                'status'=>200,
                'data' => $product
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
