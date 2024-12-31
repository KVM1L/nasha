<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
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
            $path = $request->file('logo')->store('sponsors', 'public');
            $data['logo'] = $path;
        }

        Sponsor::create($data);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor created successfully.');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'url'  => 'nullable|url',
        ]);

        $data = $request->only(['name', 'url']);

        if ($request->hasFile('logo')) {
            if ($sponsor->logo && Storage::exists($sponsor->logo)) {
                Storage::delete($sponsor->logo);
            }

            $path = $request->file('logo')->store('sponsors', 'public');
            $data['logo'] = $path;
        } else {
            $data['logo'] = $sponsor->logo;
        }

        $sponsor->update($data);

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        Storage::disk('public')->delete($sponsor->logo);

        $sponsor->delete();

        return redirect()->route('admin.sponsors.index')
            ->with('success', 'Sponsor deleted successfully.');
    }
}
