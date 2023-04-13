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

Route::GET('/alunos', function() {

    $dados = array(
    
        "1 - Vinicius",
        "2 - Galdino",
        "3 - Wesley",
        "4 - Danilo"
    );

    $alunos = "<ul>";

    foreach ($dados as $nome) {
        
        $alunos .= "<li>$nome</li>";

    }

    return $alunos;

})->name('alunos');