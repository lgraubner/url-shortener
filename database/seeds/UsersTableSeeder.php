<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function ($u) {
            $u->links()->save(factory(App\Link::class)->make());
            $u->links()->save(factory(App\Link::class)->make());
        });
    }
}
