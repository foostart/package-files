<?php namespace Foostart\Files\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Files\Models\Files;

use Illuminate\Support\MessageBag as MessageBag;

class FilesValidator extends FooValidator
{

    protected $obj_files;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'files_name' => ["required"],
            'files_overview' => ["required"],
            'files_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_files = new Files();

        // language
        $this->lang_front = 'files-front';
        $this->lang_admin = 'files-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'files_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'files_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'files_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
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
                'key' => 'files_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['files_name']['min'],
                'max' => $_ln['files_name']['max'],
            ],
            'overview' => [
                'key' => 'files_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['files_overview']['min'],
                'max' => $_ln['files_overview']['max'],
            ],
            'description' => [
                'key' => 'files_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['files_description']['min'],
                'max' => $_ln['files_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['files_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['files_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['files_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-files');
        return $configs;
    }

}