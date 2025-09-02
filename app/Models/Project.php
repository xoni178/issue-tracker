<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function issues()
    {
        return $this->hasMany(Issue::class, "project_id", "id");
    }
}
