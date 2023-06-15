<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        // You may pass any necessary data to the create view
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());
        // Redirect to the show view or index view
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        // Redirect to the show view or index view
    }

    public function destroy(Client $client)
    {
        $client->delete();
        // Redirect to the index view
    }
}
