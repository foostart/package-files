<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('files', [
    'as' => 'files',
    'uses' => 'Foostart\Files\Controllers\Front\FileFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

     
        Route::get('/admin/files', [
            'as' => 'admin_files',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/files/edit', [
            'as' => 'admin_files.edit',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/files/edit', [
            'as' => 'admin_files.post',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/files/delete', [
            'as' => 'admin_files.delete',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@delete'
        ]);


         Route::get('admin/files_category', [
            'as' => 'admin_files_category',
            'uses' => 'Foostart\Files\Controllers\Admin\FileCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/files_category/edit', [
            'as' => 'admin_files_category.edit',
            'uses' => 'Foostart\Files\Controllers\Admin\FileCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/files_category/edit', [
            'as' => 'admin_files_category.post',
            'uses' => 'Foostart\Files\Controllers\Admin\FileCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/files_category/delete', [
            'as' => 'admin_files_category.delete',
            'uses' => 'Foostart\Files\Controllers\Admin\FileCategoryAdminController@delete'
        ]);

    });
});
