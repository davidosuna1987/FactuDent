<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        //Crear roles
        DB::table('roles')->insert([
            'name' => 'The fu**ing god!',
            'slug' => 'god'
        ]);
        DB::table('roles')->insert([
            'name' => 'Administrador',
            'slug' => 'admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Usuario básico',
            'slug' => 'user'
        ]);
    }
}
