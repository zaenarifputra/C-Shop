<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = profile::all();
        return $profile;
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
        $profile = new profile();
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->hp = $request->input('hp');
        $profile->save();

        return response()->json([
            'status' => 201,
            'data' => $profile
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
        $profile = profile::find($id);
        if($profile) {
            return response()->json([
                'status' => 200,
                'data' => $profile
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
        $profile = profile::find($id);
        if($profile){
            $profile->name = $request->name ? $request->name : $profile->name;
            $profile->email = $request->email ? $request->email : $profile->email;
            $profile->hp = $request->hp ? $request->hp : $profile->hp;
            $profile->save();
            return response()->json([
                'status' => 200,
                'data' => $profile
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
        $profile = profile::where('id', $id)->first();
        if($profile){
            $profile->delete();
            return response()->json([
                'status'=>200,
                'data' => $profile
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
