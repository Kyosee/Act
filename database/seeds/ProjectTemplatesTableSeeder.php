<?php

use Illuminate\Database\Seeder;
use App\Models\ProjectTemplate;

class ProjectTemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ProjectTemplate::insert(factory(ProjectTemplate::class)->times(5)->make()->toArray());
        $template = ProjectTemplate::find(1);
        $template->template_name = '翻一翻抽奖应用';
        $template->template_folder = 'fanyifan';
        $template->save();
    }
}
