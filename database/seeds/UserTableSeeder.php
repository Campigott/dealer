<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = factory(App\User::class, 5000)->create(

        );

        foreach ($users as $user) {

            $UserAcess = factory(\App\User_Acess::class, range(1,5))->create([
                'user_id' => $user->id
            ]);
        }

    }
}
