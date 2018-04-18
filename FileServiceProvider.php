<?php

namespace Foostart\Files;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class FileServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/file_admin.php' => config_path('file_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'file');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'file');


        /**
         * Load view composer
         */
        $this->fileViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Files\Controllers\Admin\FileAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'file');
    }

    /**
     *
     */
    public function fileViewComposer(Request $request) {

        view()->composer('file::file*', function ($view) {
            global $request;
            $file_id = $request->get('id');
            $is_action = empty($file_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * files
                 */
                //list
                trans('file::file_admin.page_list') => [
                    'url' => URL::route('admin_files'),
                    "icon" => '<i class="fa fa-file"></i>'
                ],
                //add
                trans('file::file_admin.'.$is_action) => [
                    'url' => URL::route('admin_files.edit'),
                    "icon" => '<i class="fa fa-edit"></i>'
                ],

                /**
                 * Categories
                 */
                //list
                trans('file::file_admin.page_category_list') => [
                    'url' => URL::route('admin_files_category'),
                    "icon" => '<i class="fa fa-sitemap"></i>'
                ],
            ]);
            //
        });
    }

}
