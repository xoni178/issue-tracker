<?php

namespace App;

use Illuminate\Support\Facades\DB;

trait TruncateTrait
{
     /**
     * Empty the table after every time we seed the database 
     * If not emptied, fake values get stacked.
     * Must disable FOREIGN_KEY_CHECKS before, if not error.  
     * 
     * @param string
     */
    public function TruncateTable(string $model): void
    {
        DB::statement('PRAGMA foreign_keys = OFF');

        //reset the auto-incrementing ID to zero
        DB::table($model::make()->getTable())->delete();
        DB::statement("DELETE FROM sqlite_sequence WHERE name='{$model::make()->getTable()}'");
        
        DB::statement('PRAGMA foreign_keys = ON');
    }

}
