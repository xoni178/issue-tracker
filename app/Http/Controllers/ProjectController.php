<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(6);

        return view('home', ["projects" => $projects]);
    }

    public function create()
    {
         return view('create-project');
    }

    public function store()
    {

    }
    public function destroy()
    {

    }
}
