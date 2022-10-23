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
}
