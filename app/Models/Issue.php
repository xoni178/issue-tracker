<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ["project_id", "title", "description", "status", "priority", "due_date"];


    public function project()
    {
        return $this->belongsTo(Project::class, "project_id", "id");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'issue_tag', 'issue_id', 'tag_id');
    }
}
