<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('file', [
    'as' => 'file',
    'uses' => 'Foostart\File\Controllers\Front\FileFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see'],
                  'namespace' => 'Foostart\Files\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage file
          |-----------------------------------------------------------------------
          | 1. List of files
          | 2. Edit file
          | 3. Delete file
          | 4. Add new file
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/files/list', [
            'as' => 'files.list',
            'uses' => 'FileAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/files/edit', [
            'as' => 'files.edit',
            'uses' => 'FileAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/files/copy', [
            'as' => 'files.copy',
            'uses' => 'FileAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/files/edit', [
            'as' => 'files.post',
            'uses' => 'FileAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/files/delete', [
            'as' => 'files.delete',
            'uses' => 'FileAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/files/trash', [
            'as' => 'files.trash',
            'uses' => 'FileAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/files/config', [
            'as' => 'files.config',
            'uses' => 'FileAdminController@config'
        ]);

        Route::post('admin/files/config', [
            'as' => 'files.config',
            'uses' => 'FileAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/files/lang', [
            'as' => 'files.lang',
            'uses' => 'FileAdminController@lang'
        ]);

        Route::post('admin/files/lang', [
            'as' => 'files.lang',
            'uses' => 'FileAdminController@lang'
        ]);

    });
});
