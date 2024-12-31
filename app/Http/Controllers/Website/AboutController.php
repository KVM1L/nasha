<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutSettings = Setting::pluck('value', 'key')->toArray();
        $sponsors = Sponsor::all();
        $clients = Client::all();
        $employees = Employee::latest()->get();

        return view('website.about', compact('aboutSettings', 'sponsors', 'clients', 'employees'));
    }
}
