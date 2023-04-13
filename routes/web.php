<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;

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

Route::get('/', function () {
    return view('welcome');
});

Route::GET('/aluno', function() {

    $dados = array(
    
        "1 - Vinicius",
        "2 - Galdino",
        "3 - Wesley",
        "4 - Danilo"
    );

    $aluno = "<ul>";

    foreach ($dados as $nome) {
        
        $aluno .= "<li>$nome</li>";

    }

    return $aluno;

})->name('aluno');

Route::get('/aluno/limite/{total}', function($total){

    $dados = array(
    
        "1 - Vinicius",
        "2 - Galdino",
        "3 - Wesley",
        "4 - Danilo"
    );

    $aluno = "<ul>";

    if($total <= count($dados)){

        $cont = 0;

        foreach ($dados as $nome) {
            
            $aluno .= "<li>$nome</li>";

            $cont++;

            if($cont >= $total) break;

        }
    }else{

        $aluno = $aluno."<li>Tamanho Máximo = ".count($dados)."</li>";

    }

    return $aluno;

})->where('total', '[0-9]+');

Route::get('/aluno/matricula/{id}', function($id){

    $dados = array(
    
        "1 - Vinicius",
        "2 - Galdino",
        "3 - Wesley",
        "4 - Danilo"
    );

    $aluno = "<ul>";

    if($id <= count($dados)){

        $cont = 0;

        foreach ($dados as $nome) {
            
            $cont++;

            if($cont == $id){

                $aluno .= "<li>$nome</li>";
                break;

            }

        }
    }else{

        $aluno = $aluno."<li>NÃO ENCONTRADO!</li>";

    }

    return $aluno;

})->where('id', '[0-9]+');