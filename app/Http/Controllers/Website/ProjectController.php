<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('website.project', compact('project'));
    }
}
