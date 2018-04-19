<?php namespace Foostart\Files\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Files\Models\File;

use Illuminate\Support\MessageBag as MessageBag;

class FileValidator extends FooValidator
{

    protected $obj_file;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'file_name' => ["required"],
            'file_overview' => ["required"],
            'file_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_file = new File();

        // language
        $this->lang_front = 'file-front';
        $this->lang_admin = 'file-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'file_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'file_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'file_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'file_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['file_name']['min'],
                'max' => $_ln['file_name']['max'],
            ],
            'overview' => [
                'key' => 'file_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['file_overview']['min'],
                'max' => $_ln['file_overview']['max'],
            ],
            'description' => [
                'key' => 'file_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['file_description']['min'],
                'max' => $_ln['file_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['file_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['file_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['file_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-file');
        return $configs;
    }

}