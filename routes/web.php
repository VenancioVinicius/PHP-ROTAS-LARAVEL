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

Route::get('/nota', function(){

    $dados = array(
    
        array("matricula" => "1", "aluno" => "Vinicius", "nota" => "9"),
        array("matricula" => "2", "aluno" => "Galdino", "nota" => "2"),
        array("matricula" => "3", "aluno" => "Wesley", "nota" => "8"),
        array("matricula" => "4", "aluno" => "Danilo", "nota" => "6"),
        array("matricula" => "5", "aluno" => "Marcola", "nota" => "4")

    );

    $table  = '<table>';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<td><h3>Matricula</h3></td>';
    $table .= '<td><h3>Aluno</h3></td>';
    $table .= '<td><h3>Nota</h3></td>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    foreach ($dados as $dado) {
        $table .= '<tr>';
        $table .= "<td><center>{$dado["matricula"]}</center></td>";
        $table .= "<td><center>{$dado["aluno"]}</center></td>";
        $table .= "<td><center>{$dado["nota"]}</center></td>";
        $table .= '</tr>';
    }

    $table .= '</tbody>';
    $table .= '</table>';

    return $table;

});

Route::get('/nota/limite/{valor}', function($valor){

    $dados = array(
    
        array("matricula" => "1", "aluno" => "Vinicius", "nota" => "9"),
        array("matricula" => "2", "aluno" => "Galdino", "nota" => "2"),
        array("matricula" => "3", "aluno" => "Wesley", "nota" => "8"),
        array("matricula" => "4", "aluno" => "Danilo", "nota" => "6"),
        array("matricula" => "5", "aluno" => "Marcola", "nota" => "4")

    );

    $table  = '<table>';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<td><h3>Matricula</h3></td>';
    $table .= '<td><h3>Aluno</h3></td>';
    $table .= '<td><h3>Nota</h3></td>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    if($valor <= count($dados)){

        $cont = 0;

        foreach ($dados as $dado) {

            $table .= '<tr>';
            $table .= "<td><center>{$dado["matricula"]}</center></td>";
            $table .= "<td><center>{$dado["aluno"]}</center></td>";
            $table .= "<td><center>{$dado["nota"]}</center></td>";
            $table .= '</tr>';

            $cont++;
            if($cont >= $valor) break;
        }
    }else{

        $table = $table."<li>Tamanho Máximo = ".count($dados)."</li>";

    }

    $table .= '</tbody>';
    $table .= '</table>';

    return $table;

})->where('valor', '[0-9]+');