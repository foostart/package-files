<?php

namespace Foostart\Files\Controlers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Files\Models\Filess;

class FilesUserController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_files = new Filess();
        $files = $obj_files->get_files();
        $this->data = array(
            'request' => $request,
            'files' => $files
        );
        return view('files::files.index', $this->data);
    }

}