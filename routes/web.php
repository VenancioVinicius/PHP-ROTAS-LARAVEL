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
        "4 - Danilo",
        "5 - Marcola"
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
        "4 - Danilo",
        "5 - Marcola"
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

Route::get('/aluno/matricula/{matricula}', function($matricula){

    $dados = array(
    
        //array("1 - ", "Vinicius"),
        "1 - Vinicius",
        "2 - Galdino",
        "3 - Wesley",
        "4 - Danilo",
        "5 - Marcola"
    );

    $aluno = "<ul>";

    if($matricula <= count($dados)){

        $cont = 0;

        foreach ($dados as $nome) {
            
            $cont++;

            if($cont == $matricula){

                $aluno .= "<li>$nome</li>";
                break;

            }

        }
    }else{

        $aluno = $aluno."<li>NÃO ENCONTRADO!</li>";

    }

    return $aluno;

})->where('matricula', '[0-9]+');

Route::get('/aluno/nome/{nome}', function($nome){

    $dados = array(
    
        array("id" => "1 - ", "nick" => "Vinicius"),
        array("id" => "2 - ", "nick" => "Galdino" ),
        array("id" => "3 - ", "nick" => "Wesley"),
        array("id" => "4 - ", "nick" => "Danilo"),
        array("id" => "5 - ", "nick" => "Marcola")
    );

    $aluno = "<ul>";
    $validacao = 0;

    foreach ($dados as $nomes) {
        
        if($nomes["nick"] == $nome){
            $aluno .= "<li>".$nomes["id"].$nomes["nick"]."</li>";
            $validacao = 1;
            break;
        };

    }

    if($validacao == 0){

        $aluno = $aluno."<li>NÃO ENCONTRADO!</li>";

    }

    return $aluno;

})->where('nome', '[A-Za-z]+');