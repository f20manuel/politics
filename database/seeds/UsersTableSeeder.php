<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Administrador
        $user = new User();
        $user->name = 'Manuel Fernández';
        $user->email = 'f20manuel@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('V-21163066');
        $user->save();

        //Uriel User
        $user = new User();
        $user->name = 'Uriel';
        $user->email = 'urielgo2001@yahoo.es';
        $user->email_verified_at = now();
        $user->password = Hash::make('urielgo0301');
        $user->save();

        //Administrador
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@emoci.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('123456');
        $user->save();

        //Digitador
        $user = new User();
        $user->name = 'Digitaor';
        $user->email = 'digit@emoci.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('123456');
        $user->save();
    }
}
