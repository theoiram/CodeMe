<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert(array(
                array(
                    'role_id' => 1,
                    'name' => 'Alejandro Torres',
                    'email' => 'alex910121@gmail.com',
                    'password' => bcrypt('password')
                )
        ));
    }
}
