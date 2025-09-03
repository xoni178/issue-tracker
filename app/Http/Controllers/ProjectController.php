<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);

        if(request()->wantsJson()){
            return response()->json($projects);
        }

        return view('home', ["projects" => $projects]);
    }


    public function create()
    {
      
        return view('create-project');
    }

    public function store(CreateProjectRequest $request)
    {
        $validated = $request->validated();

        Project::create([
            "name" => $validated["name"],
            "description" => $validated["description"],
        ]);

        return redirect("/");
    }
    public function show($project_id)
    {
        $project = Project::find($project_id);

        if($project === null) return;

        $issues =  $project->issues;
        
        return view("project-details", ["project" => $project, "issues" => $issues]);
    }

    public function edit($project_id)
    {
        $project = Project::find($project_id);

        if($project === null) return;

        return view('edit-project', ["project" => $project]);
    }

    public function update(UpdateProjectRequest $request, $project_id)
    {
       
        $validated = $request->validated();

        $project = Project::find($project_id);

        if($project === null) return;

        $project->update($validated);

        return redirect("/projects/{$project->id}");

    }
    public function destroy($project_id)
    {
        $project = Project::find($project_id);

        if($project === null) return;

        $project->delete();

        return redirect("/");
    }
}
