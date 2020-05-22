<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Json\ClientJson;
use App\Http\Resources\PaginatedCollection;

use App\User;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::with('client')->paginate();

        $response = new PaginatedCollection($clients, ClientJson::class);

        return response()->json($response);
    }

}
