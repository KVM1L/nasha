<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('website.home', compact('projects'));
    }
}
