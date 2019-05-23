<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach ($desenvolvedores as $d) {
        echo "<p> Nome do desenvolvedor:". $d->nome ."</p>";
        echo "<p> Cargo:". $d->cargo ."</p>";
        if (count($d->projetos) > 0) {
            echo "Projetos: <br>";
            echo "<ul>";
            foreach ($d->projetos as $p) {
                echo "<li>";
                echo "<b>Nome projeto</b>: " . $p->nome . " | ";
                echo "<b>Estimativa projeto</b>: " . $p->estimativa_horas . " | " ;
                echo "<b>Horas semanais</b>: " . $p->pivot->horas_semanais . " | " ;

                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

    //return $desenvolvedores->toJson();
});
