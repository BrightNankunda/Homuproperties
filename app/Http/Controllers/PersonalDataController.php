<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function update(Request $request, PersonalData $personaldata)
    {
        $data->status = $request->status;
        $data->gender = $request->gender;
        $data->preferredLocation = $request->preferredLocation;
        
        if($request->hasFile('profileImage')) {
            $profileImage = time().".".$request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->move(public_path('PersonalData'), $profileImage);
        }
        $data->profileImage = $profileImage;
        $data->save();


        $personaldata->update($data);

        return response()->json([
            'Updated' => $data,
            'Message' => 'Data updated'
        ]);
    }
    
    //ADMIN ROUTE 
    public function delete($id) {
        $data = PersonalData::findOrFail($id);
        $data->delete();
        return response()->json('Deleted');
    }
}
