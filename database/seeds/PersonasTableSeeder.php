<?php

use App\Persona;
use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 15;
        factory(Persona::class, $count)->create();
    }
}
