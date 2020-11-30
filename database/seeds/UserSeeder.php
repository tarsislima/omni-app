<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Operador',
            'email' => 'operador@bemol.com.br',
            'type' => 'operator',
            'cep' => '40265-600',
            'address' => 'Rua das aboboras 100, Salvador BA',
        ]);
    }
}
