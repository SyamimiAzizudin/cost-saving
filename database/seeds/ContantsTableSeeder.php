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

        $data = [
            'MNE',
            'Equipment',
            'Corporation',
        	
        ];

        foreach ($data as $datum) {
        	Company::create([
        		'group' => $datum
        	]);
        }
    }
}
