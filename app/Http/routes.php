<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "QuizController@index");
Route::post('/create', "QuizController@create");
Route::post('/store', "QuizController@store");

Route::get('/quiz/edit','QuizController@edit'); //Liberar Mesa
Route::post('/quiz/update', array('as' => 'quiz.update', 'uses' => 'QuizController@update'));

Route::get('/view/{id}', "QuizController@view");
Route::post('/group/{id}/update', "QuizController@updateGroup");
Route::get('/reemail/{id}', "QuizController@reemail");

Route::get('/take/{id}/{member_id}', "QuizController@take");
Route::get('/quiz/{id}/{member_id}', "QuizController@quiz");
Route::get('/finish/{id}/{member_id}', "QuizController@finishQuiz");
Route::get('/requiz/{id}/{member_id}', "QuizController@requiz");
Route::get('/thanks/{id}/{member_id}', "QuizController@completeQuiz");

Route::get('/denied', "QuizController@deniedQuiz");
Route::get('/unavailable', "QuizController@unavailableQuiz");

Route::post('/nextquestion/{quiz}', "QuizController@nextQuestion");
Route::post('/quiz/storeanswers/{quiz}', "QuizController@storeAnswers");

Route::get('/member/{id}', "QuizController@showMember");
Route::get('/member/{id}/edit', "QuizController@editMember");
Route::post('/member/{id}/update', "QuizController@updateMember");
Route::post('/member/{id}/uploadphoto', "QuizController@uploadMemberPhoto");
Route::post('/member/batchmembers', "QuizController@batchMembers");

Route::post('/member/{id}/sendreport', "QuizController@sendReport");

Route::post('/member/{id}/updatephoto', "QuizController@updateProfilePhoto");

Route::get('/results/first/{member_id}', "QuizController@reportOne");
Route::get('/results/second/{member_id}', "QuizController@reportTwo");
Route::post('/results/first/share/{member_id}', 'QuizController@shareReport');
Route::get('/results/first/view/{member_id}', 'QuizController@viewResults');
Route::get('/results/first/download/{member_id}', 'QuizController@downloadPdf');
Route::post('/result/store/image/{member_id}', 'QuizController@setSessionImage');

Route::post('/member/images/uploads', "QuizController@uploadTempPhoto");
Route::get('/examples', "QuizController@test");



Route::get('/samples', "QuizController@samples");
Route::get('/email', "QuizController@email");

Route::get('/quizdate', "QuizController@quizdate")->name('quizdate');

Route::group(['middleware' => ['web']], function () {
    //
});
