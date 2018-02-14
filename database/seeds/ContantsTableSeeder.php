<?php

use Illuminate\Database\Seeder;

class ContantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'username' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);

        $data = [
            'Admin',
            'Subsidiary',
            'Board',
        	
        ];

        foreach ($data as $datum) {
        	User::create([
        		'userRole' => $datum
        	]);
        }
    }
}
