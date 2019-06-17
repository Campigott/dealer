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
        for ($i=0; $i < 2000 ; $i++) {
            $UserAcess = factory(\App\User_Acess::class, rand(5,100))->create([
                'user_id' => array_rand($this->getRandomUserId())
            ]);
        }

    }

    private function getRandomUserId() {
        $user = \App\User::get('id')->toArray();
        return $user;
    }
}
