<?php

use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert(['nome' => 'Sistema de alocação de recursos', 'estimativa_horas' => 200]);
        DB::table('projetos')->insert(['nome' => 'Sistema de alocação de bibliotecas', 'estimativa_horas' => 3000]);
        DB::table('projetos')->insert(['nome' => 'Sistema de vendas', 'estimativa_horas' => 1200]);
        DB::table('projetos')->insert(['nome' => 'Novo sistema', 'estimativa_horas' => 5000]);


    }
}
