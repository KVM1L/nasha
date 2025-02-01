<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.add');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $data = $request->validate([
            'title' => 'required|array',
            'slug' => 'required|string',
            'tags' => 'nullable|array',
            'text' => 'nullable|array',
            'description' => 'nullable|array',
            'cover' => 'nullable|image',
            'video' => 'nullable|file|mimes:mp4,mov,avi,mkv',
            'video_mobile' => 'nullable|file|mimes:mp4,mov,avi,mkv',
            'photo_1' => 'nullable|image',
            'photo_2' => 'nullable|image',
            'footer_photo' => 'nullable|image',
        ]);

        // Обработка файлов (обложка)
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('projects', 'public');
        }

        // Обработка видеофайла
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('projects/videos', 'public');
        }

        if ($request->hasFile('video_mobile')) {
            $data['video_mobile'] = $request->file('video_mobile')->store('projects/videos', 'public');
        }

        // Обработка фото
        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = $request->file('photo_1')->store('projects', 'public');
        }
        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = $request->file('photo_2')->store('projects', 'public');
        }
        if ($request->hasFile('footer_photo')) {
            $data['footer_photo'] = $request->file('footer_photo')->store('projects', 'public');
        }

        // Создание проекта
        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // Валидация данных
        $data = $request->validate([
            'title' => 'required|array',
            'slug' => 'required|string',
            'tags' => 'nullable|array',
            'text' => 'nullable|array',
            'description' => 'nullable|array',
            'cover' => 'nullable|image',
            'video' => 'nullable|file|mimes:mp4,mov,avi,mkv',
            'video_mobile' => 'nullable|file|mimes:mp4,mov,avi,mkv',
            'photo_1' => 'nullable|image',
            'photo_2' => 'nullable|image',
            'footer_photo' => 'nullable|image',
        ]);

        // Обработка обложки
        if ($request->hasFile('cover')) {
            if ($project->cover) {
                Storage::disk('public')->delete($project->cover);
            }
            $data['cover'] = $request->file('cover')->store('projects', 'public');
        }

        // Обработка видеофайла
        if ($request->hasFile('video')) {
            if ($project->video) {
                Storage::disk('public')->delete($project->video);
            }
            $data['video'] = $request->file('video')->store('projects/videos', 'public');
        }

        if ($request->hasFile('video_mobile')) {
            if ($project->video_mobile) {
                Storage::disk('public')->delete($project->video_mobile);
            }
            $data['video_mobile'] = $request->file('video_mobile')->store('projects/videos', 'public');
        }

        // Обработка фото
        if ($request->hasFile('photo_1')) {
            if ($project->photo_1) {
                Storage::disk('public')->delete($project->photo_1);
            }
            $data['photo_1'] = $request->file('photo_1')->store('projects', 'public');
        }

        if ($request->hasFile('photo_2')) {
            if ($project->photo_2) {
                Storage::disk('public')->delete($project->photo_2);
            }
            $data['photo_2'] = $request->file('photo_2')->store('projects', 'public');
        }

        if ($request->hasFile('footer_photo')) {
            if ($project->footer_photo) {
                Storage::disk('public')->delete($project->footer_photo);
            }
            $data['footer_photo'] = $request->file('footer_photo')->store('projects', 'public');
        }

        // Обновление проекта
        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Удаляем связанные файлы, если есть
        if ($project->cover) {
            Storage::disk('public')->delete($project->cover);
        }
        if ($project->video) {
            Storage::disk('public')->delete($project->video);
        }
        if ($project->video_mobile) {
            Storage::disk('public')->delete($project->video_mobile);
        }
        if ($project->photo_1) {
            Storage::disk('public')->delete($project->photo_1);
        }
        if ($project->photo_2) {
            Storage::disk('public')->delete($project->photo_2);
        }
        if ($project->footer_photo) {
            Storage::disk('public')->delete($project->footer_photo);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
