<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoAppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = ['todo', '本を買う', '仕事に行く', '友だちと会う'];
        foreach ($content as $contents) {
            DB::table('todo_apps')->insert([
                'content' => $contents,
                'created_at' => new DateTime()
            ]);
        }
    }
}
