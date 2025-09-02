<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    
    protected $fillable = ["name", "description"];


    public function issues()
    {
        return $this->hasMany(Issue::class, "project_id", "id");
    }
}
