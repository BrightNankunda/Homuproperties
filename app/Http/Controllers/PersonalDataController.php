<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PersonalData;

class PersonalDataController extends Controller
{
    public function getUserData()
    {
        $personaldata = PersonalData::where('id', Auth()->user()->id)->first();
        return response()->json($personaldata);
    }

    public function store(Request $request)
    {
        $data = new PersonalData;

        $data->user_id = Auth()->user()->id;
        $data->status = $request->status;
        $data->gender = $request->gender;
        $data->preferredLocation = $request->preferredLocation;
        
        if($request->hasFile('profileImage')) {
            $profileImage = time().".".$request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->move(public_path('PersonalData'), $profileImage);
        }
        $data->profileImage = $profileImage;
        $data->save();

        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        $data = PersonalData::findOrFail($id);
        $profileImage = $data->profileImage;
        if($request->hasFile('profileImage')) {
            // $request->validate([
            //     'profileImage' => ['image','mimes:jpg,jpeg']
            // ]);
            // if($profileImage) {

            //     Storage::delete('/public/PersonalData/'.$profileImage);
            //     // Storage::delete(public_path('PersonalData'), $profileImage);
            // }
            $profileImage = time().".".$request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->move(public_path('PersonalData'), $profileImage);
        }
        $data->update([
            'status' => $request->status,
            'gender' => $request->gender,
            'preferredLocation' => $request->preferredLocation,
            'profileImage' => $profileImage
        ]);

        return response()->json($data);
        // return response()->json($request);
    }
    
    //ADMIN ROUTE 
    public function delete($id) {
        $data = PersonalData::findOrFail($id);
        $data->delete();
        return response()->json('Deleted');
    }
}
