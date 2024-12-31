<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'url'  => 'nullable|url',
        ]);

        $data = $request->only(['name', 'url']);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('clients', 'public');
            $data['logo'] = $path;
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'url'  => 'nullable|url',
        ]);

        $data = $request->only(['name', 'url']);

        if ($request->hasFile('logo')) {
            if ($client->logo && Storage::exists($client->logo)) {
                Storage::delete($client->logo);
            }

            $path = $request->file('logo')->store('clients', 'public');
            $data['logo'] = $path;
        } else {
            $data['logo'] = $client->logo;
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        Storage::disk('public')->delete($client->logo);

        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
