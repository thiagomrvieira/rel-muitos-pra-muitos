<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome' => 'Thiago Maciel', 'cargo' => 'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome' => 'Carlos Arnaldo', 'cargo' => 'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome' => 'Fernanda Lemos', 'cargo' => 'Programador']);

    }
}
