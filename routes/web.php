<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::group(['middleware' => ['auth']], function () {

    //rotas para o cartorio
    Route::prefix('cartorio')->group(function () {
        Route::get('', 'CartorioController@index')->name('cadastro.listar');

        Route::prefix('importar')->group(function () {
            Route::get('', 'ImportarCartorioController@index')->name('cadastro.importar.excel');
            Route::post('processar', 'ImportarCartorioController@importar_excel')->name('cadastro.importar.excel.processar');
        });
        //Route::match(['get', 'post'], '/listar_arquivos_importados-serventia/', 'ImportarServentiaController@listaImportacao')->name('importar.arquivos');
    });

//});
