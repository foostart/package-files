    <?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('files', [
    'as' => 'files',
    'uses' => 'Foostart\Files\Controllers\Front\FilesFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see','in_context'],
                  'namespace' => 'Foostart\Files\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage files
          |-----------------------------------------------------------------------
          | 1. List of files
          | 2. Edit files
          | 3. Delete files
          | 4. Add new files
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/files/list', [
            'as' => 'files.list',
            'uses' => 'FilesAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/files/edit', [
            'as' => 'files.edit',
            'uses' => 'FilesAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/files/copy', [
            'as' => 'files.copy',
            'uses' => 'FilesAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/files/edit', [
            'as' => 'files.post',
            'uses' => 'FilesAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/files/delete', [
            'as' => 'files.delete',
            'uses' => 'FilesAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/files/trash', [
            'as' => 'files.trash',
            'uses' => 'FilesAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/files/config', [
            'as' => 'files.config',
            'uses' => 'FilesAdminController@config'
        ]);

        Route::post('admin/files/config', [
            'as' => 'files.config',
            'uses' => 'FilesAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/files/lang', [
            'as' => 'files.lang',
            'uses' => 'FilesAdminController@lang'
        ]);

        Route::post('admin/files/lang', [
            'as' => 'files.lang',
            'uses' => 'FilesAdminController@lang'
        ]);
        
        
     
           
          
    });
});
