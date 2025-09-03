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
        $issue = Issue::find($issue_id);
        $project = Project::find($project_id);

        if(!$issue || !$project) return;

        return view("show-issue", ["issue" => $issue, "project" => $project]);
    }
    public function destroy()
    {

    }
}
