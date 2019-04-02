<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Team;
use App\Models\Role;
use App\Models\Project;
use App\Models\Client;
use App\Models\Tag;
use App\Models\Category;
use \Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Add static roles
        DB::table('roles')->insert([
            'name' => 'administrator',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()]);
        DB::table('roles')->insert([
            'name' => 'user',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()]);


        // Add categories
        factory(Tag::class, 30)->create();
        // Add tags
        factory(Category::class, 30)->create();

        // add profile from user
        factory(User::class, 50)->create()->each(function ($user) {


            // Add profile
            $user->profile()->save(factory(Profile::class)->make());
            $team = factory(Team::class)->make();
            // Add teams
            $user->own_team()->save($team);
            $user->teams()->save($team);
            $user->teams()->attach(User::all()->random()->id);

            // Add profile
            $user->profile()->save(factory(Profile::class)->make());

            // Add to role_user table
            $user->roles()->attach(Role::all()->random()->id);

            // Every user  has 1-4 project
            $user->projects()->saveMany(factory(Project::class, rand(1, 4))->make())->each(function ($project) use ($user) {

                $project->tags()->attach(Tag::all()->random(rand(1, 5)));

                $project->categories()->attach(Category::all()->random(rand(1, 7)));

                $project->users()->attach($user->id);
                $project->users()->attach(User::all()->random()->id);

            });
            // Add clients
            $user->clients()->saveMany(factory(Client::class,50)->make());

        });


//        factory(Project::class)->make()->each(function ($project) {
//
//        });


    }
}
