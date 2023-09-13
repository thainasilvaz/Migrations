<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');
Route::get('/sobrenos', 'App\Http\Controllers\SobreNosController@principal')->name('site.sobrenos');
Route::get('/contato', 'App\Http\Controllers\ContatoController@principal')->name('site.contato');

Route::prefix('/admin')-> group (function() {
    Route::get('/clientes', function() {return 'Clientes';});
    Route::get('/fornecedores', 'App\Http\Controllers\FornecedoresController@index')->name('admin.fornecedores');
    Route::get('/produtos', function() {return 'produtos';});
});

Route::get('/admin', function(){
    return redirect()->route('site.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contato/{nome?}/{mensagem?}',
    function(string $nome, string $mensagem = 'sem texto')
    {echo "passagem de parametros via browser: $nome - $mensagem";}
);

Route::fallback(function(){
    echo ' a rota não existe <a href= "'.route('site.index'). '"> Clique aqui </a> ';
});

require __DIR__.'/auth.php';