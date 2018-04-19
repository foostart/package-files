<?php

namespace Foostart\Files\Controlers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Files\Models\Files;

class FileFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_file = new Files();
        $files = $obj_file->get_files();
        $this->data = array(
            'request' => $request,
            'files' => $files
        );
        return view('file::file.index', $this->data);
    }

}