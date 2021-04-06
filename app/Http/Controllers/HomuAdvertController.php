<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomuAdvert;
use Illuminate\Support\Facades\Auth;

class HomuAdvertController extends Controller
{
    public function allAdverts() {
        $allAdverts = HomuAdvert::all();
        return response()->json($allAdverts);
    }
    public function oneAdvert() {
        $oneAdvert  = HomuAdvert::get()->first();
        return response()->json($oneAdvert);
    }
    public function store(Request $request)
    {
        $request->validate([
            'advert_header' => 'required|string',
            'advert_body' => 'required|string',
            'advert_image' => 'required'
        ]);

        $newAdvert = new HomuAdvert();
        $newAdvert->user_id = Auth()->user()->id;
        $newAdvert->advert_header = $request->advert_header;
        $newAdvert->advert_body = $request->advert_body;
        
        if($request->hasFile('advert_image')) {
            $advert_image_name = time().".".$request->file('advert_image')->getClientOriginalName();
            $request->file('advert_image')->move(public_path('adverts'), $advert_image_name);
        };
        $newAdvert->advert_image = $advert_image_name;
        $newAdvert->save();

        return response()->json($newAdvert);
    }
    public function show()
    {
        
    }

    public function update(Request $request, $id)
    {
        $advert = HomuAdvert::findOrFail($id);
        // if(!empty($advert)) {
        //     
        // }
        // $advert->advert_header = $request->advert_header;
        // $advert->advert_body = $request->advert_body;
        
        // if($request->hasFile('advert_image')) {
        //     $advert_image_name = time().".".$request->file('advert_image')->getClientOriginalName();
        //     $request->file('advert_image')->move(public_path('adverts'), $advert_image_name);
        // };
        // $newAdvert->advert_image = $advert_image_name;
        $advert->update();

        return response()->json($advert);
    }
    public function delete(HomuAdvert $advert)
    {
        $advert->delete();
        return response()->json('Deleted');
        // if($client->user_id !== auth()->user()->id) {
        //     return response()->json('You are Unauthorized');
        // } else {
        //     $client->delete();
        //     return response()->json('Client Deleted');

        // }
    }
}
