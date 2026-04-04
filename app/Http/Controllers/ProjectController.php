<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'technologies' => 'nullable|string'
        ]);

        // IMAGE UPLOAD PRODUCTION
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        // technologies
        $validated['technologies'] = !empty($validated['technologies'])
            ? array_map('trim', explode(',', $validated['technologies']))
            : [];


        // if(!empty($validated['technologies'])) {
        //     $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        // } else {
        //     $validated['technologies'] = [];
        // }

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'technologies' => 'nullable|string'
        ]);
        if ($request->hasFile('image')) {

            // supprimer ancienne image
            if ($project->image && file_exists(public_path('images/' . $project->image))) {
                unlink(public_path('images/' . $project->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $validated['image'] = $imageName;
        }

        // if ($request->hasFile('image')) {
        //     if ($project->image) Storage::disk('public')->delete($project->image);
        //     $validated['image'] = $request->file('image')->store('projects', 'public');
        // }

        $validated['technologies'] = !empty($validated['technologies'])
            ? array_map('trim', explode(',', $validated['technologies']))
            : [];

        // if(!empty($validated['technologies'])) {
        //     $validated['technologies'] = array_map('trim', explode(',', 
        //     $validated['technologies']));
        // } else {
        //     $validated['technologies'] = [];
        // }

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        // if ($project->image) Storage::disk('public')->delete($project->image);
        if ($project->image && file_exists(public_path('images/' . $project->image))) {
            unlink(public_path('images/' . $project->image));
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }
}
