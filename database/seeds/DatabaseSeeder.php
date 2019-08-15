<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class,
        DepartamentosTableSeeder::class,
        MunicipiosTableSeeder::class,
        ComunasTableSeeder::class,
        EstadoApoyoTableSeeder::class,
        OcupacionTableSeeder::class,
        NivelAcademicoTableSeeder::class,
        GeneroTableSeeder::class,
        PersonasTableSeeder::class,
        PermisosTableSeeder::class
        ]);
    }
}
