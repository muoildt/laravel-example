<?php

use Illuminate\Database\Seeder;

class PhonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Member::class, 20)->create()->each(function ($phone) {
        $phone->phone()->save(factory(App\Phone::class)->make());
    });
    }
}
