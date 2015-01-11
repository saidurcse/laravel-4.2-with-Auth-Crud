<?php

class UsersTableSeederTableSeeder extends Seeder {

    public function run()
    {
        $users = array(
            array(
                'email' => 's@gmail.com',
                'password' => Hash::make('pass123')
            )
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}