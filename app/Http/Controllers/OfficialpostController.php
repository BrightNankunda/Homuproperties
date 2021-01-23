<?php

namespace App\Http\Controllers;

use App\Models\Officialpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;

class OfficialpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function official()
    {
        $officialpost = Officialpost::where('user_id', auth()->user()->id)->first();
        
        if ($officialpost) {
            return response()->json($officialpost);
        } else {
            return response()->json([
                'message' => 'You have no official property post'
            ]);
        }
    }

    public function storepost(Request $request)
    {
        $request->validate([
            'official' => 'required|string'
        ]);

        $officialpost = Officialpost::create([
            'user_id' => Auth()->user()->id,
            'official' => $request->official
        ]);
        
        if($officialpost) {
            return response()->json($officialpost); 
        } else {
            return response()->json(['Error' => 'Failed to create official post']);
        }
        
    }

    public function profile(Request $request)
    {
        $request->validate([
            'pic' => 'required|image|mimes:jpeg,jpg'
        ]);

        $profile = new Officialpost();

        if($request->hasFile('pic')) {
            $name = time().".".$request->file('pic')->getClientOriginalName();
            $request->file('pic')->move(public_path('profile'), $name);
        };

        $profile->pic = $name;
        $profile->save();

    }


    
    public function update(Request $request, Officialpost $officialpost)
    {
        $data = $request->validate([
            'official' => 'required|string'
        ]);

        $officialpost->update($data);

        return response()->json([
            'Updated' => $data,
            'Message' => 'Data updated'
        ]);

    }

    
    public function delete(Officialpost $officialpost)
    {
        $officialpost->delete();

        return response()->json('Official post deleted');
    }
}