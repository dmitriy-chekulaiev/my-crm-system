<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{

    public function index(Client $client)
    {
        $clients = Auth::user()->clients;
        return view('clients.index', compact('clients'));
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string',
        ]);
        $client = Client::create([
            'user_id' => $userId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'contact_person' => $request->contact_person,
        ]);
        if ($client) {
            Session::flash('success', __('Client has been created'));
            return redirect('/clients');
        }
    }


    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }


    public function edit(Client $client)
    {
        //
    }


    public function update(Request $request, Client $client)
    {
        //
    }


    public function destroy(Client $client)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
