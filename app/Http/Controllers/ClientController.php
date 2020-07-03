<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('index', compact('clients'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->all());
        $request->session()->flash('status', 'Client added successfully');

        return redirect()->route('index');
    }

    public function edit(Client $client)
    {
        return view('form', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());
        $request->session()->flash('status', 'Client updated successfully');

        return redirect()->route('index');
    }

    public function destroy(Request $request, Client $client)
    {
        $client->delete();
        $request->session()->flash('status', 'Client removed successfully');

        return redirect()->route('index');
    }
}
