<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
<<<<<<< HEAD
Route::get('file', [
    'as' => 'file',
    'uses' => 'Foostart\File\Controllers\Front\FileFrontController@index'
=======
Route::get('files', [
    'as' => 'files',
    'uses' => 'Foostart\Files\Controllers\Front\FileFrontController@index'
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
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

<<<<<<< HEAD
        /**
         * list
         */
        Route::get('admin/files/list', [
            'as' => 'files.list',
            'uses' => 'FileAdminController@index'
=======
     
        Route::get('/admin/files', [
            'as' => 'admin_files',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@index'
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
        ]);

        /**
         * edit-add
         */
        Route::get('admin/files/edit', [
<<<<<<< HEAD
            'as' => 'files.edit',
            'uses' => 'FileAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/files/copy', [
            'as' => 'files.copy',
            'uses' => 'FileAdminController@copy'
=======
            'as' => 'admin_files.edit',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@edit'
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
        ]);

        /**
         * post
         */
        Route::post('admin/files/edit', [
<<<<<<< HEAD
            'as' => 'files.post',
            'uses' => 'FileAdminController@post'
=======
            'as' => 'admin_files.post',
            'uses' => 'Foostart\Files\Controllers\Admin\FileAdminController@post'
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
        ]);

        /**
         * delete
         */
        Route::get('admin/files/delete', [
<<<<<<< HEAD
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
=======
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
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
        ]);

    });
});
