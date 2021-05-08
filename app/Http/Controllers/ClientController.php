<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalData;
use App\Models\Client;

class ClientController extends Controller
{
    public function clients()
    {
        $clients = Client::where('user_id', Auth()->user()->id)->paginate(3);
        if($clients) {
            return response()->json($clients);
        } else {
            return response()->json([
                'message' => 'You have no registered clients'
            ]);
        }
        
    }
    public function register(Request $request)
    {
        $request->validate([
            'clientName' => 'required|string',
            'clientContact' => 'required|string',
            'propertyName' => 'required|string',
            'monthsPaid' => 'required|string',
            'roomNumber' => 'string',
            'accessNumber' => 'string',
            'paid' => 'boolean',
            'verified' => 'boolean'
        ]);

        $client = Client::create([
            'user_id' => Auth()->user()->id,
            'clientName' => $request->clientName,
            'clientContact' => $request->clientContact,
            'propertyName' => $request->propertyName,
            'monthsPaid' => $request->monthsPaid,
            'roomNumber' => $request->roomNumber,
            'accessNumber' => $request->accessNumber,
            'paid' => $request->paid,
            'verified' => $request->verified
        ]);

        
            return response()->json($client);
        
        }

        public function show($id)
        {
            $client = Client::findOrFail($id);
            return response()->json($client);
        }
    public function update(Request $request, Client $client)
    {
        $loggedInUserId = auth()->user()->id;

        if($client->user_id !== $loggedInUserId) {
            return response()->json('You are Unauthorized');
        }
        // return response()->json($client);

        $data = $request->validate([
            'clientName' => 'required|string',
            'clientContact' => 'required|string',
            'propertyName'=>'required|string',
            'monthsPaid' => 'required|string',
            'roomNumber' => 'string',
            'accessNumber' => 'string',
            'paid' => 'boolean',
            'verified' => 'boolean'
        ]);
        //PERSONAL DATA
        // $personaldata = PersonalData::findOrFail($loggedInUserId);
        
        
        // return response()->json($data);
        // $transanction = DB::transaction(function () {
            $client->update($data);
            // $personaldata->update([
                // 'status' => 'Updated',
                // 'gender' => $request->gender,
                // 'preferredLocation' => $request->preferredLocation,
                // 'profileImage' => $profileImage
            // ]);

        // });

        return response()->json([
            'Updated' => $data,
            // 'personaldata' => $personaldata,
            'Message' => 'Client Data updated'
        ]);

    }

    public function delete(Request $request, Client $client)
    {
        // $clientsToDelete = $request->client;
        // $userClientsIds = auth()->user()->clients->map(function ($c) {
        //     return $c->id;
        // });

        // $valid = collect($clientsToDelete)->every(function($value, $key) use ($userClientsIds) {
        //     return $userClientsIds->contains($value);
        // });
        if($client->user_id !== auth()->user()->id) {
            return response()->json('You are Unauthorized');
        } else {
            $client->delete();
            return response()->json('Client Deleted');

        }
        // return response()->json($request->client->user_id);


    }
}
