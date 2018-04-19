<?php

namespace Foostart\Files\Models;

use Illuminate\Database\Eloquent\Model;

class FilesCategories extends Model {

    protected $table = 'files_categories';
    public $timestamps = false;
    protected $fillable = [
        'file_category_name'
    ];
    protected $primaryKey = 'file_category_id';

    public function get_files_categories($params = array()) {
        $eloquent = self::orderBy('file_category_id');

        if (!empty($params['file_category_name'])) {
            $eloquent->where('file_category_name', 'like', '%'. $params['file_category_name'].'%');
        }
        $files_category = $eloquent->paginate(10);
        return $files_category;
    }

    /**
     *
     * @param type $input
     * @param type $file_id
     * @return type
     */
    public function update_file_category($input, $file_id = NULL) {

        if (empty($file_id)) {
            $file_id = $input['file_category_id'];
        }

        $file = self::find($file_id);

        if (!empty($file)) {

            $file->file_category_name = $input['file_category_name'];

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
    public function add_file_category($input) {

        $file = self::create([
                    'file_category_name' => $input['file_category_name'],
        ]);
        return $file;
    }

    /**
     * Get list of files categories
     * @param type $category_id
     * @return type
     */
     public function pluckSelect($category_id = NULL) {
        if ($category_id) {
            $categories = self::where('file_category_id', '!=', $category_id)
                    ->orderBy('file_category_name', 'ASC')
                ->pluck('file_category_name', 'file_category_id');
        } else {
            $categories = self::orderBy('file_category_name', 'ASC')
                ->pluck('file_category_name', 'file_category_id');
        }
        return $categories;
    }

}
