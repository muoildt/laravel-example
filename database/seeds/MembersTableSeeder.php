<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Member::truncate();
    	(new Faker\Generator)->seed(123);
    	factory(App\Member::class, 50)->create();

    }

    
}
