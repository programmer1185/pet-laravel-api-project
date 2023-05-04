<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'name' => 'Feature Sites',
            'slug' => 'featured'
        ]);

        Topic::create([
            'name' => 'Useful Links',
            'slug' => 'links'
        ]);

        Topic::create([
            'name' => 'Guides & Tutorials',
            'slug' => 'tutorials'
        ]);
    }
}
