<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\CreateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(5);
  
        return view('home', ["projects" => $projects]);
    }

    public function create()
    {
      
        return view('create-project');
    }

    public function store(CreateProjectRequest $request)
    {
        $validated = $request->validated();
        dump($validated);

        Project::create([
            "name" => $validated["name"],
            "description" => $validated["description"],
        ]);

        return redirect("/");
    }
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        
        return view("project-details", ["project" => $project]);
    }

    public function destroy()
    {

    }
}
