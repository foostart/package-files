<?php

namespace Foostart\Files\Controllers\Admin;

/*
  |-----------------------------------------------------------------------
  | FilesAdminController
  |-----------------------------------------------------------------------
  | @author: Kang
  | @website: http://foostart.com
  | @date: 28/12/2017
  |
 */

use Illuminate\Http\Request;
use URL,
    Route,
    Redirect;
use Illuminate\Support\Facades\App;
use Foostart\Category\Library\Controllers\FooController;
use Foostart\Files\Models\Files;
use Foostart\Category\Models\Category;
use Foostart\Files\Validators\FilesValidator;

class FilesAdminController extends FooController {

    public $obj_item = NULL;
    public $obj_category = NULL;
    public $statuses = NULL;
     
    public function __construct() {

        parent::__construct();
        // models
        $this->obj_item = new Files(array('perPage' => 10));
        $this->obj_category = new Category();

        // validators
        $this->obj_validator = new FilesValidator();

        // set language files
        $this->plang_admin = 'files-admin';
        $this->plang_front = 'files-front';

        // package name
        $this->package_name = 'package-files';
        $this->package_base_name = 'files';

        // root routers
        $this->root_router = 'files';

        // page views
        $this->page_views = [
            'admin' => [
                'items' => $this->package_name . '::admin.' . $this->package_base_name . '-items',
                'edit' => $this->package_name . '::admin.' . $this->package_base_name . '-edit',
                'config' => $this->package_name . '::admin.' . $this->package_base_name . '-config',
                'lang' => $this->package_name . '::admin.' . $this->package_base_name . '-lang',
            ]
        ];

        $this->data_view['status'] = $this->obj_item->getPluckStatus();
        $this->statuses = config('package-files.status.list');
        $this->statuses;
        //set category;
        $this->category_ref_name = 'admin/files';
    }

    /**
     * Show list of items
     * @return view list of items
     * @date 27/12/2017
     */
    public function index(Request $request) {

        $params = $request->all();

        $items = $this->obj_item->selectItems($params);

        // display view
        $this->data_view = array_merge($this->data_view, array(
            'items' => $items,
            'request' => $request,
            'params' => $params,
            'statuses' => $this->statuses,
        ));

        return view($this->page_views['admin']['items'], $this->data_view);
    }

    /**
     * Edit existing item by {id} parameters OR
     * Add new item
     * @return view edit page
     * @date 26/12/2017
     */
    public function edit(Request $request) {

        $item = NULL;
        $categories = NULL;

        $params = $request->all();
        $params['id'] = $request->get('id', NULL);

        $context = $this->obj_item->getContext($this->category_ref_name);

        if (!empty($params['id'])) {

            $item = $this->obj_item->selectItem($params, FALSE);

            if (empty($item)) {
                return Redirect::route($this->root_router . '.list')
                                ->withMessage(trans($this->plang_admin . '.actions.edit-error'));
            }
        }

        //get categories by context
        $context = $this->obj_item->getContext($this->category_ref_name);
        if ($context) {
            $params['context_id'] = $context->context_id;
            $categories = $this->obj_category->pluckSelect($params);
        }

        // display view
        $this->data_view = array_merge($this->data_view, array(
            'item' => $item,
            'categories' => $categories,
            'request' => $request,
            'context' => $context,
            'statuses' => $this->statuses,
        ));
        return view($this->page_views['admin']['edit'], $this->data_view);
    }

    /**
     * Processing data from POST method: add new item, edit existing item
     * @return view edit page
     * @date 27/12/2017
     */
    public function post(Request $request) {

        $item = NULL;

        $params = array_merge($request->all(), $this->getUser());

        $is_valid_request = $this->isValidRequest($request);

        $id = (int) $request->get('id');

        if ($is_valid_request && $this->obj_validator->validate($params)) {// valid data
            // update existing item
            if (!empty($id)) {

                $item = $this->obj_item->find($id);

                if (!empty($item)) {

                    $params['id'] = $id;
                    $item = $this->obj_item->updateItem($params);

                    // message
                    return Redirect::route($this->root_router . '.edit', ["id" => $item->id])
                                    ->withMessage(trans($this->plang_admin . '.actions.edit-ok'));
                } else {

                    // message
                    return Redirect::route($this->root_router . '.list')
                                    ->withMessage(trans($this->plang_admin . '.actions.edit-error'));
                }

                // add new item
            } else {

                $item = $this->obj_item->insertItem($params);

                if (!empty($item)) {

                    //message
                    return Redirect::route($this->root_router . '.edit', ["id" => $item->id])
                                    ->withMessage(trans($this->plang_admin . '.actions.add-ok'));
                } else {

                    //message
                    return Redirect::route($this->root_router . '.edit', ["id" => $item->id])
                                    ->withMessage(trans($this->plang_admin . '.actions.add-error'));
                }
            }
        } else { // invalid data
            $errors = $this->obj_validator->getErrors();

            // passing the id incase fails editing an already existing item
            return Redirect::route($this->root_router . '.edit', $id ? ["id" => $id] : [])
                            ->withInput()->withErrors($errors);
        }
    }

    /**
     * Delete existing item
     * @return view list of items
     * @date 27/12/2017
     */
    public function delete(Request $request) {

        $item = NULL;
        $flag = TRUE;
        $params = array_merge($request->all(), $this->getUser());
        $delete_type = isset($params['del-forever']) ? 'delete-forever' : 'delete-trash';
        $id = (int) $request->get('id');
        $ids = $request->get('ids');

        $is_valid_request = $this->isValidRequest($request);

        if ($is_valid_request && (!empty($id) || !empty($ids))) {

            $ids = !empty($id) ? [$id] : $ids;

            foreach ($ids as $id) {

                $params['id'] = $id;

                if (!$this->obj_item->deleteItem($params, $delete_type)) {
                    $flag = FALSE;
                }
            }
            if ($flag) {
                return Redirect::route($this->root_router . '.list')
                                ->withMessage(trans($this->plang_admin . '.actions.delete-ok'));
            }
        }

        return Redirect::route($this->root_router . '.list')
                        ->withMessage(trans($this->plang_admin . '.actions.delete-error'));
    }

<<<<<<< HEAD
    public function configs(Request $request) {
        $is_valid_request = $this->isValidRequest($request);
        // display view
        $name = $request->get('name');
   

        $config_path = realpath(base_path('vendor/foostart/package-files/Views/admin/'.$name));
        $package_path = realpath(base_path('vendor/foostart/package-files'));
       
        $config_bakup = realpath($package_path .'/storage/backup');
      
=======
    public function edits(Request $request) {
        $is_valid_request = $this->isValidRequest($request);
        // display view

        $config_path = realpath(base_path('vendor/foostart/package-files/Views/admin/files-edit.blade.php'));
        $package_path = realpath(base_path('vendor/foostart/package-files'));
       
        $config_bakup = realpath($package_path .'/storage/bak');

>>>>>>> ff6d4b825bce2a70aa96cbada9dcc3b366372739
        if ($version = $request->get('v')) {
            //load backup config
            $content = file_get_contents(base64_decode($version));
        } else {
            //load current config
            $content = file_get_contents($config_path);
        }

        if ($request->isMethod('post') && $is_valid_request) {

            //create backup of current config
            file_put_contents($config_bakup . '/package-files-' . date('YmdHis', time()) . '.php', $content);

            //update new config
            $content = $request->get('content');

            file_put_contents($config_path, $content);
        }

        $backups = array_reverse(glob($config_bakup . '/*'));

        $this->data_view = array_merge($this->data_view, array(
            'request' => $request,
            'content' => $content,
            'backups' => $backups,  
        ));



        return view($this->page_views['admin']['config'], $this->data_view);
    }

    /**
     * Manage configuration of package
     * @param Request $request
     * @return view config page
     */
    public function config(Request $request) {
        $is_valid_request = $this->isValidRequest($request);
        // display view

       

        $config_path = realpath(base_path('config/package-files.php'));
        
        $package_path = realpath(base_path('vendor/foostart/package-files'));
     
<<<<<<< HEAD
         var_dump($package_path);
=======
 
>>>>>>> ff6d4b825bce2a70aa96cbada9dcc3b366372739
        $config_bakup = realpath($package_path . '/storage/backup');
            
        
        if ($version = $request->get('v')) {
            //load backup config
            $content = file_get_contents(base64_decode($version));
          
        } else {
            //load current config
            $content = file_get_contents($config_path);
        }

        if ($request->isMethod('post') && $is_valid_request) {

            //create backup of current config
            file_put_contents($config_bakup . '/package-files-' . date('YmdHis', time()) . '.php', $content);
         
            //update new config
            $content = $request->get('content');

            file_put_contents($config_path, $content);
        }

        $backups = array_reverse(glob($config_bakup . '/*'));

        $this->data_view = array_merge($this->data_view, array(
            'request' => $request,
            'content' => $content,
            'backups' => $backups,
        ));

        return view($this->page_views['admin']['config'], $this->data_view);
    }
<<<<<<< HEAD
   
=======

>>>>>>> ff6d4b825bce2a70aa96cbada9dcc3b366372739
    /**
     * Manage languages of package
     * @param Request $request
     * @return view lang page
     */
    public function lang(Request $request) {
        $is_valid_request = $this->isValidRequest($request);
        // display view
        $langs = config('package-files.langs');
        $lang_paths = [];

        if (!empty($langs) && is_array($langs)) {
            foreach ($langs as $key => $value) {
                $lang_paths[$key] = realpath(base_path('resources/lang/' . $key . '/files-admin.php'));
            }
        }

        $package_path = realpath(base_path('vendor/foostart/package-files'));

        $lang_bakup = realpath($package_path . '/storage/backup/lang');
        $lang = $request->get('lang') ? $request->get('lang') : 'en';
        $lang_contents = [];

        if ($version = $request->get('v')) {
            //load backup lang
            $group_backups = base64_decode($version);
            $group_backups = empty($group_backups) ? [] : explode(';', $group_backups);

            foreach ($group_backups as $group_backup) {
                $_backup = explode('=', $group_backup);
                $lang_contents[$_backup[0]] = file_get_contents($_backup[1]);
            }
        } else {
            //load current lang
            foreach ($lang_paths as $key => $lang_path) {
                $lang_contents[$key] = file_get_contents($lang_path);
            }
        }

        if ($request->isMethod('post') && $is_valid_request) {

            //create backup of current config
            foreach ($lang_paths as $key => $value) {
                $content = file_get_contents($value);

                //format file name files-admin-YmdHis.php
                file_put_contents($lang_bakup . '/' . $key . '/files-admin-' . date('YmdHis', time()) . '.php', $content);
            }


            //update new lang
            foreach ($langs as $key => $value) {
                $content = $request->get($key);
                file_put_contents($lang_paths[$key], $content);
            }
        }

        //get list of backup langs
        $backups = [];
        foreach ($langs as $key => $value) {
            $backups[$key] = array_reverse(glob($lang_bakup . '/' . $key . '/*'));
        }

        $this->data_view = array_merge($this->data_view, array(
            'request' => $request,
            'backups' => $backups,
            'langs' => $langs,
            'lang_contents' => $lang_contents,
            'lang' => $lang,
        ));

        return view($this->page_views['admin']['lang'], $this->data_view);
    }

    /**
     * Edit existing item by {id} parameters OR
     * Add new item
     * @return view edit page
     * @date 26/12/2017
     */
    public function copy(Request $request) {

        $params = $request->all();

        $item = NULL;
        $params['id'] = $request->get('cid', NULL);

        $context = $this->obj_item->getContext($this->category_ref_name);

        if (!empty($params['id'])) {

            $item = $this->obj_item->selectItem($params, FALSE);

            if (empty($item)) {
                return Redirect::route($this->root_router . '.list')
                                ->withMessage(trans($this->plang_admin . '.actions.edit-error'));
            }

            $item->id = NULL;
        }

        $categories = $this->obj_category->pluckSelect($params);

        // display view
        $this->data_view = array_merge($this->data_view, array(
            'item' => $item,
            'categories' => $categories,
            'request' => $request,
            'context' => $context,
        ));

        return view($this->page_views['admin']['edit'], $this->data_view);
    }

}
