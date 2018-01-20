<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Project::insert(factory(Project::class)->times(5)->make()->toArray());

        $project = Project::find(1);
        $project->project_name = '旺年驾Dog';
        $project->save();
    }
}
