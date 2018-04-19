<?php

namespace Foostart\Files;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
<<<<<<< HEAD
use URL,
    Route;
use Illuminate\Http\Request;

=======

use URL, Route;
use Illuminate\Http\Request;


>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
class FileServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
<<<<<<< HEAD

        //generate context key
//        $this->generateContextKey();

        // load view
        $this->loadViewsFrom(__DIR__ . '/Views', 'package-file');

        // include view composers
        require __DIR__ . "/composers.php";

        // publish config
        $this->publishConfig();

        // publish lang
        $this->publishLang();

        // publish views
        $this->publishViews();

        // publish assets
        $this->publishAssets();
=======
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
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';
<<<<<<< HEAD
    }

    /**
     * Public config to system
     * @source: vendor/foostart/package-file/config
     * @destination: config/
     */
    protected function publishConfig() {
        $this->publishes([
            __DIR__ . '/config/package-file.php' => config_path('package-file.php'),
                ], 'config');
    }

    /**
     * Public language to system
     * @source: vendor/foostart/package-file/lang
     * @destination: resources/lang
     */
    protected function publishLang() {
        $this->publishes([
            __DIR__ . '/lang' => base_path('resources/lang'),
        ]);
    }

    /**
     * Public view to system
     * @source: vendor/foostart/package-file/Views
     * @destination: resources/views/vendor/package-file
     */
    protected function publishViews() {

        $this->publishes([
            __DIR__ . '/Views' => base_path('resources/views/vendor/package-file'),
        ]);
    }

    protected function publishAssets() {
        $this->publishes([
            __DIR__ . '/public' => public_path('packages/foostart/package-file'),
        ]);
    }

}
=======

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
>>>>>>> 222d2943ad430aae2a94c9fff5e795128cab16fc
