<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\CreateProjectRequest;

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
        dump($validated);

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


    public function destroy()
    {

    }
}
