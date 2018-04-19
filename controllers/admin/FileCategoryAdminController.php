<?php namespace Foostart\Files\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Files\Controllers\Admin\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Files\Models\FilesCategories;
/**
 * Validators
 */
use Foostart\Files\Validators\FileCategoryAdminValidator;

class FileCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_file_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_file_category = new FilesCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_file_category = $this->obj_file_category->get_files_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'files_categories' => $list_file_category,
            'request' => $request,
            'params' => $params
        ));
        return view('file::file_category.admin.file_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $file = NULL;
        $file_id = (int) $request->get('id');


        if (!empty($file_id) && (is_int($file_id))) {
            $file = $this->obj_file_category->find($file_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'file' => $file,
            'request' => $request
        ));
        return view('file::file_category.admin.file_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new FileCategoryAdminValidator();

        $input = $request->all();

        $file_id = (int) $request->get('id');

        $file = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($file_id) && is_int($file_id)) {

                $file = $this->obj_file_category->find($file_id);
            }

        } else {
            if (!empty($file_id) && is_int($file_id)) {

                $file = $this->obj_file_category->find($file_id);

                if (!empty($file)) {

                    $input['file_category_id'] = $file_id;
                    $file = $this->obj_file_category->update_file_category($input);

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_update_successfully'));
                    return Redirect::route("admin_files_category.edit", ["id" => $file->file_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_update_unsuccessfully'));
                }
            } else {

                $file = $this->obj_file_category->add_file_category($input);

                if (!empty($file)) {

                    //Message
                    $this->addFlashMessage('message', trans('file::file_admin.message_add_successfully'));
                    return Redirect::route("admin_files_category.edit", ["id" => $file->file_id]);
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

        return view('file::file_category.admin.file_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $file = NULL;
        $file_id = $request->get('id');

        if (!empty($file_id)) {
            $file = $this->obj_file_category->find($file_id);

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

        return Redirect::route("admin_files_category");
    }

}