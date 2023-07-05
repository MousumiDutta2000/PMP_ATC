<?php

use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migration;

class AddUuidToProjects extends Migration
{
    public function up()
    {
        $projects = \App\Models\Project::all();

        foreach ($projects as $project) {
            // $project->uuid = Str::uuid();
            $table->string('uuid', 8)->unique()->after('id');
            $project->save();
        }
    }

    public function down()
    {
        // No need to rollback this migration as it only populates data
    }
}
