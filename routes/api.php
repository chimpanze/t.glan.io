<?php
Route::group(['namespace' => 'Api\V1', 'as' => 'api.'], function() {
    Route::get('translation/{project}/{context}/{language}.json', 'OutputController@json');
});

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('projects', 'ProjectsController');
    Route::apiResource('languages', 'LanguagesController');
    Route::apiResource('contexts', 'ContextsController');
    Route::apiResource('strings', 'StringsController');
    Route::apiResource('translations', 'TranslationsController');
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
});
