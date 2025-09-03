<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreIssueRequest;

use App\Models\Project;
use App\Models\Issue;

class IssueController extends Controller
{
    public function store($project_id, StoreIssueRequest $request)
    {
        $validated = $request->validated();

        if(!Project::where("id", $project_id)->exists()) return;

        Issue::create([
            "project_id" => $project_id,
            "title" => $validated["title"],
            "description" => $validated["description"],
            "priority" => $validated["priority"],
            "due_date" => $validated["due_date"]
        ]);

        return redirect("/projects/" . $project_id);
        
    }
    public function show($project_id, $issue_id)
    {

        $project = Project::with(['issues' => function($query) use ($issue_id) {
            $query->where('id', $issue_id);
        }])->where('id', $project_id)->first();

        $issue = $project->issues->first();
        
        $tags = $issue->tags;

        if(!$issue || !$project) return;

        return view("show-issue", ["issue" => $issue, "project" => $project, "tags" => $tags]);
    }
    public function createTag($project_id, $issue_id, \Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name|string|max:50',
            'color' => 'required|string|regex:/^#([0-9a-fA-F]{3}){1,2}$/'
        ], [
            'name.required' => 'Tag name is required.',
            'name.unique' => 'Tag name must be unique.',
            'name.string' => 'Tag name must be a string.',
            'name.max' => 'Tag name must not exceed 50 characters.',
            'color.required' => 'Color is required.',
            'color.string' => 'Color must be a string.',
            'color.regex' => 'Color must be a valid hex code.'
        ]);

       $tag = \App\Models\Tag::create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);

        $issue = Issue::find($issue_id);
        if(!$issue) return;
        $issue->tags()->attach($tag->id); 

        return response()->json($tag, 201);
    }

    public function destroy()
    {

    }
}
