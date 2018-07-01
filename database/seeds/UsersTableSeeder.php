<?php

use Illuminate\Database\Seeder;
use App\Models\Link;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create()->each(function ($u) {
            $u->links()->save(factory(Link::class)->make());
            $u->links()->save(factory(Link::class)->make());
        });
    }
}
