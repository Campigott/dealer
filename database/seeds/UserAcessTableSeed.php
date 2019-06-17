<?php

use Illuminate\Database\Seeder;
use App\User_Acess;

class UserAcessTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UserAcess = factory(\App\User_Acess::class, 300)->create([
            'user_id' => $this->getRandomUserId()
        ]);
    }

    private function getRandomUserId() {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
    }
}
