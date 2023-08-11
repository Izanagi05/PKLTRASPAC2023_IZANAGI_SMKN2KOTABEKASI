<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/getsiswa/exportpdf', 'SiswaController@exportpdf');
$router->get('/getsiswa/exportpelajaran', 'PelajaranController@exportpelajaran');
$router->get('/getsiswa/exportmerge', 'PelajaranController@exportmerge');
$router->get('/getsiswa/exportexcel', 'SiswaController@exportexcel');
$router->post('/postsiswa', 'SiswaController@store');
$router->post('/updatesiswa', 'SiswaController@update');
$router->delete('/deletesiswa/{id}', 'SiswaController@delete');
