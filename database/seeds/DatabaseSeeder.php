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
            'name' => 'Ганна Саржан',
            'role' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        $users = factory(\App\User::class, 20)->create();
        $topic_categories = factory(\App\TopicCategory::class, 5)->create();

        foreach ($users as $user) {
            $user_topics = factory(\App\Topic::class, rand(0,3))->create();

            foreach ($user_topics as $topic) {
                $topic->author_id = $user->id;
                $topic->category_id = $topic_categories->random()->id;
                $topic->save();
            }
        }

        $topics = \App\Topic::all();
        $comments = factory(\App\Comment::class, 500)->create();

        foreach ($comments as $comment) {
            $comment->author_id = $users->random()->id;
            $comment->topic_id = $topics->random()->id;
            $comment->save();
        }

    }
}
