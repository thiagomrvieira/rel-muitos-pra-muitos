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


Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach ($projetos as $p) {
        echo "<p><b> Nome do projeto:</b> ". $p->nome ."</p>";
        echo "<p><b> Estimativas de horas do projeto: </b>". $p->estimativa_horas ."</p>";
        if (count($p->desenvolvedores) > 0) {
            echo "Desenvolvedores: <br>";
            echo "<ul>";
            foreach ($p->desenvolvedores as $d) {
                echo "<li>";
                echo "<b>Nome do Dev</b>: " . $d->nome . " | ";
                echo "<b>Cargo</b>: " . $d->cargo . " | " ;
                echo "<b>Horas semanais</b>: " . $d->pivot->horas_semanais ;

                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

    //return $desenvolvedores->toJson();
});

Route::get('/alocar', function () {
    $projeto = Projeto::find(4);
    if (isset($projeto)) {
        // Alocando apenas um:
        // $projeto->desenvolvedores()->attach(1, ['horas_semanais' => 50]);        
        
        // Para alocar vários
        $projeto->desenvolvedores()->attach([
            2 => ['horas_semanais' => 30],
            3 => ['horas_semanais' => 34],
        ]);
    
    }
});


Route::get('/desalocar', function () {
    $projeto = Projeto::find(4);
    if (isset($projeto)) {
        $projeto->desenvolvedores()->detach([1,2,3]);        
        
        // ou
        // $projeto->desenvolvedores()->detach(1);   
        // $projeto->desenvolvedores()->detach(2);   
        // $projeto->desenvolvedores()->detach(3);   
    }
});