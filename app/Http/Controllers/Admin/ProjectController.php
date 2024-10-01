<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Helper::generateSlug($data['name'], Project::class);
        if (array_key_exists('img_path', $data)) {
            $img_path = Storage::put('uploads', $data['img_path']);
            $img_name = $request->file('img_path')->getClientOriginalName();
            $data['img_path'] = $img_path;
            $data['img_name'] = $img_name;
        }
        $project = Project::create($data);
        if (array_key_exists('technologies', $data)) {
            $project->technologies()->attach($data['technologies']);
        }


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->all();
        if (!$data['name'] === $project->name) {
            $data['slug'] = Helper::generateSlug($data['name'], project::class);
        }
        $project->update($data);
        if (array_key_exists('technologies', $data)) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.show', $project)->with('success', 'Elemento modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('deleted', 'Elemento eliminato con successo');
    }
}
