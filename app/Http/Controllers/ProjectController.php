<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Issue;
use App\Models\Tag;

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
    public function show($project_id, Request $request)
    {
        $project = Project::find($project_id);

        if($project === null) return;

        if($request->filled('status') || $request->filled('priority') || $request->filled('tag')){
            $status = $request->input('status');
            $priority = $request->input('priority');
            $tag = $request->input('tag');

            $issuesQuery = Issue::where('project_id', $project_id);

            if($status) $issuesQuery->where('status', $status);
            

            if($priority) $issuesQuery->where('priority', $priority);
            

            if($tag){
                $issuesQuery->whereHas('tags', function($query) use ($tag) {
                    $query->where('id', $tag);
                });
            }

            //Eager load tags
            $issues = $issuesQuery->with('tags:id,name,color')
                        ->select('id','project_id','title','status','priority','due_date', "created_at", "updated_at")
                        ->latest()
                        ->get();

            $tags = $issues->flatMap->tags->unique('id')->values();

            return view("project-details", ["project" => $project, "issues" => $issues, "tags" => $tags]);
        }

        //Eager load tags 
        $issues = Issue::with('tags:id,name,color')
                ->where('project_id', $project_id)
                ->select('id','project_id','title','status','priority','due_date', "created_at", "updated_at")
                ->latest()
                ->get();
        
        $tags = $issues->flatMap->tags->unique('id')->values();

        
        return view("project-details", ["project" => $project, "issues" => $issues, "tags" => $tags]);
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
