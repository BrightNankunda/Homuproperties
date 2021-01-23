<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pic;
use Illuminate\Support\Facades\Auth;

class PicController extends Controller
{
    public function index()
    {
        $pic = Pic::where('user_id', Auth()->user()->id)->first();
        return response()->json($pic);
    }

    public function pic(Request $request) 
    {
        $request->validate(['pic' => 'required|image|mimes:jpeg,jpg']);

        $pic = new Pic;

        $pic->user_id = Auth()->user()->id;

        if($request->hasfile('pic')) {
            $name = time().".".$request->file('pic')->getClientOriginalName();
            $request->file('pic')->move(public_path('pics'), $name);
        }
        $pic->pic = $name;
        $pic->save();

        return response()->json($pic);
    }
}
