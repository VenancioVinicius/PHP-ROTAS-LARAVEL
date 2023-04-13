<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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
    
    $alunos = "<ul>
    
        <li>1 - Vinicius</li>
        <li>2 - Galdino</li>
        <li>3 - Wesley</li>
    
    </ul>";

    return $alunos;

})->name('alunos');