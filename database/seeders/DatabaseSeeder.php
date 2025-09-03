<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\TruncateTrait;
use Illuminate\Database\Seeder;
use App\Models\Issue;

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

         $this->TruncateTable(Issue::class);
        Issue::factory(50)->create();
    }
}
