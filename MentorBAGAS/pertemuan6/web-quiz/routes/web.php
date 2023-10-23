<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/getquestionbank', 'QuestionBankController@getdata');
$router->post('/postquestionbank', 'QuestionBankController@postquestionbank');
$router->post('/updatequestionbank', 'QuestionBankController@updatedata');
$router->delete('/deletequestionbank/{id}', 'QuestionBankController@deletedata');

// $router->get('/getquestionbankbankquizzes', 'QuestionBankQuizzesController@getdata');
$router->post('/postquestionbankwitpivot/{quizzes_id}', 'QuestionBankQuizzesController@postquestionbankwitpivot');
$router->post('/postpivotquestionbank/{questionbank_id}/{quizzes_id}', 'QuestionBankQuizzesController@postpivotquestionbank');
$router->delete('/deletepivotquestionbank/{id}', 'QuestionBankQuizzesController@deletepivotquestionbank');

$router->post('/postquizzeswitpivot/{questionbank_id}', 'QuestionBankQuizzesController@postquizzeswitpivot');
$router->post('/postpivotquizzez/{quizzes_id}/{questionbank_id}', 'QuestionBankQuizzesController@postpivotquizzez');
$router->delete('/deletepivotquizes/{id}', 'QuestionBankQuizzesController@deletepivotquizes');
// $router->post('/postquestionbankbankquizzes', 'QuestionBankQuizzesController@postdata');
// $router->post('/updatequestionbankbankquizzes', 'QuestionBankQuizzesController@updatedata');
// $router->delete('/deletequestionbankbankquizzes/{id}', 'QuestionBankQuizzesController@deletedata');

$router->get('/getquizzes', 'QuizzesController@getdata');
$router->post('/postquizzes', 'QuizzesController@postdata');
$router->post('/updatequizzes', 'QuizzesController@updatedata');
// $router->delete('/deletequizzes/{id}', 'QuizzesController@deletedata');
$router->delete('/deletequizzes/{id}', 'QuizzesController@deletedata');
$router->delete('/deletequizzes2/{id}', 'QuizzesController@deletedata');
