<?php

namespace Foostart\Files\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

    protected $table = 'files';
    public $timestamps = false;
    protected $fillable = [
        'file_name',
        'category_id'
    ];
    protected $primaryKey = 'file_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_files($params = array()) {
        $eloquent = self::orderBy('file_id');

        //file_name
        if (!empty($params['file_name'])) {
            $eloquent->where('file_name', 'like', '%'. $params['file_name'].'%');
        }

        $files = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $files;
    }



    /**
     *
     * @param type $input
     * @param type $file_id
     * @return type
     */
    public function update_file($input, $file_id = NULL) {

        if (empty($file_id)) {
            $file_id = $input['file_id'];
        }

        $file = self::find($file_id);

        if (!empty($file)) {

            $file->file_name = $input['file_name'];
            $file->category_id = $input['category_id'];

            $file->save();

            return $file;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_file($input) {

        $file = self::create([
                    'file_name' => $input['file_name'],
                    'category_id' => $input['category_id'],
        ]);
        return $file;
    }
}
