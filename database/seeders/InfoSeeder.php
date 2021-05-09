<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Info::factory(15)->create()->each(function ($info) {
            $tags = Tag::pluck('name')->all();
            $info->attachTag($tags[array_rand($tags)]);
        });
    }
}
