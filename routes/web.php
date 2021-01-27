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

use App\Jobs\newLaravelTips as JobsNewLaravelTips;
use App\Mail\newLaravelTips;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('envio-email', function () {
    // stdClass() cria um objeto vazio
    $user = new stdClass();
    $user->name = "Fernando";
    $user->email = "exfer.contato@gmail.com";
    //Dessa forma manda o e-mail direto sem colocar na fila: Mail::send(new newLaravelTips($user));
    //Dessa forma manda o e-mail para a fila: Mail::queue(new newLaravelTips($user));
    //A linha abaixo serve somente para debugar o e-mail
    //return new newLaravelTips($user);
    JobsNewLaravelTips::dispatch($user)->delay(now()->addSeconds(15)); //diapatch faz a injeção de independência. O delay é pra informar ao job quando será processado
});