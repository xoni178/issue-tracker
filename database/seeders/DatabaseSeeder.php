<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\TruncateTrait;
use Illuminate\Database\Seeder;
use App\Models\Issue;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    use TruncateTrait;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->TruncateTable(Project::class);
        Project::factory(10)->create();
        
        $this->TruncateTable(User::class);
        User::factory(4)->create();

        $this->TruncateTable(Tag::class);
        Tag::factory(10)->create();

        $this->TruncateTable(Issue::class);
        Issue::factory(50)->create()->each(function ($issue) {
            $tagIds = Tag::inRandomOrder()->take(rand(1, 10))->pluck('id');
            $issue->tags()->attach($tagIds);
        });


      
    }
}
