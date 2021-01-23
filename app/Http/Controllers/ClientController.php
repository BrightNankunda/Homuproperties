<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function clients()
    {
        $clients = Client::where('user_id', Auth()->user()->id)->get();
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

    public function update(Request $request, Client $client)
    {
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

        $client->update($data);

        return response()->json([
            'Updated' => $data,
            'Message' => 'Client Data updated'
        ]);

    }

    public function delete(Client $client)
    {
        $client->delete();
        return response()->json('Client Deleted');
    }
}
