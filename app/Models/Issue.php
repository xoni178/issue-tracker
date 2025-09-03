<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ["project_id", "title", "description", "status", "priority", "due_date"];


    public function project()
    {
        return $this->belongsTo(Project::class, "project_id", "id");
    }
}
