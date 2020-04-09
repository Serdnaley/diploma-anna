<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\User::class)->create([
            'name' => 'Anna Sarzhan',
            'role' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        $users = factory(\App\User::class, 20)->create();
        $topic_categories = factory(\App\TopicCategory::class, 5)->create();
        
        foreach ($users as $user) {
            $topics = factory(\App\Topic::class, rand(0,3))->create();

            foreach ($topics as $topic) {
                $topic->author_id = $user->id;
                $topic->category_id = $topic_categories->random()->id;
                $topic->save();
            }
        }
        
    }
}
