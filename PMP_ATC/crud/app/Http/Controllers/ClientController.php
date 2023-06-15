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
    return view('clients.create');
}

public function store(Request $request)
{
    // Validate the input
    $validatedData = $request->validate([
        'project_id' => 'required',
        // Add validation rules for other fields if needed
    ]);

    // Create a new client
    $client = new Client();
    $client->project_id = $validatedData['project_id'];
    // Set other client fields
    
    // Save the client
    $client->save();
    
    return redirect()->route('clients.index')->with('success', 'Client created successfully.');
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
    
    return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
}


public function destroy(Client $client)
{
    $client->delete();
    
    return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
}

}
