<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list() {
        $clients = Client::all();

        return response()->json([
            'status' => 1,
            'msg' => 'Clients list',
            'data' => $clients
        ], 200);
    }

    public function create(Request $request) {
        $client = Client::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'age' => $request->age,
            'city' => $request->city,
            'goal' => $request->goal,
            'medical_history' => $request->medical_history
        ]);

        return response()->json([
            'status' => 1,
            'msg' => 'Client created',
            'data' => $client
        ], 200);
    }
}
