<?php

use \Jarker\Entry\Http\Controllers;

Route::group(['middleware' => 'web'], function () {
    Route::get('/entry-code/authenticate', [Controllers\AuthenticateController::class, 'get'])->name('entry-code.authenticate');
    Route::post('/entry-code/authenticate', [Controllers\AuthenticateController::class, 'post'])->name('entry-code.authenticate.post');


    Route::get('/entry-code/manage', [Controllers\ManageController::class, 'get'])->name('entry-code.manage');
    Route::post('/entry-code/manage/{entryCode}', [Controllers\ManageController::class, 'post'])->name('entry-code.manage.post');
});
