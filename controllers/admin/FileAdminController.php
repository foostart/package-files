<?php

namespace Foostart\Files\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Files\Controllers\Admin\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Files\Models\Files;
use Foostart\Files\Models\FilesCategories;
/**
 * Validators
 */
use Foostart\Files\Validators\FileAdminValidator;

class FileAdminController extends Controller {

    public $data_view = array();
    private $obj_file = NULL;
    private $obj_file_categories = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_file = new Files();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_file = $this->obj_file->get_files($params);

        $this->data_view = array_merge($this->data_view, array(
            'files' => $list_file,
            'request' => $request,
            'params' => $params
        ));
        return view('file::file.admin.file_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $file = NULL;
        $file_id = (int) $request->get('id');


        if (!empty($file_id) && (is_int($file_id))) {
            $file = $this->obj_file->find($file_id);
        }

        $this->obj_file_categories = new FilesCategories();

        $this->data_view = array_merge($this->data_view, array(
            'file' => $file,
            'request' => $request,
            'categories' => $this->obj_file_categories->pluckSelect()
        ));
        return view('file::file.admin.file_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new FileAdminValidator();

        $input = $request->all();

        $file_id = (int) $request->get('id');
        $file = NULL;

        $data = array();

        if ($this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($file_id) && is_int($file_id)) {

                $file = $this->obj_file->find($file_id);
            }
        } else {
            if (!empty($file_id) && is_int($file_id)) {

                $file = $this->obj_file->find($file_id);

                if (!empty($file)) {

                    $input['file_id'] = $file_id;
                    $file = $this->obj_file->update_file($input);

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_update_successfully'));
                    return Redirect::route("admin_files.edit", ["id" => $file->file_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_update_unsuccessfully'));
                }
            } else {

                $file = $this->obj_file->add_file($input);

                if (!empty($file)) {

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_add_successfully'));
                    return Redirect::route("admin_files.edit", ["id" => $file->file_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'file' => $file,
            'request' => $request,
                ), $data);

        return view('file::file.admin.file_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $file = NULL;
        $file_id = $request->get('id');

        if (!empty($file_id)) {
            $file = $this->obj_file->find($file_id);

            if (!empty($file)) {
                //Message
                $this->addFlashMessage('message', trans('file::file_admin.message_delete_successfully'));

                $file->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'file' => $file,
        ));

        return Redirect::route("admin_files");
    }

}
