<?php
return [

    //Number of worlds
    'length' => [
        'files_name' => [
            'min' => 10,
            'max' => 255,
        ],
        'files_overview' => [
            'min' => 10,
            'max' => 255,
        ],
        'files_description' => [
            'min' => 255,
            'max' => 0,//unlimit
        ],
        'files_description' => [
            'min' => 255,
            'max' => 0,//unlimit
        ],
    ],
    'per_page' => 1,

    /*
    |-----------------------------------------------------------------------
    | ENVIRONMENT
    |-----------------------------------------------------------------------
    | 0: Development
    | 1: Production
    |
    */
    'env' => 0,
    'load_from' => 'package-files::',

    /*
    |-----------------------------------------------------------------------
    | LANGUAGES
    |-----------------------------------------------------------------------
    | vi
    | en
    |
    */
    'langs' => [
        'en' => 'English',
        'vi' => 'Vietnam'
    ],

     /*
 +      |--------------------------------------------------------------------------
 +      | ITEM STATUS
 +      |--------------------------------------------------------------------------
 +      | @public = 99
 +      | @in_trash = 55 delete from list
 +      | @draft = 11 auto save
 +      | @unpublish = 33
 +     */
    'status' => [
        'list' => [
           99 => 'Publish',
            33 => 'Unpublish',
            55 => 'In trash',
           11 => 'Draft',
       ],
       'color' => [
            11 => '#ef4832',
           33 => '#000000',
           55 => '#a8aac2',
           99 => '#5bc0de'
        ]
       ],
    
    
    /*
    |-----------------------------------------------------------------------
    | Permissions
    |-----------------------------------------------------------------------
    | List
    | Edit
    | Add
    | Select
    |
    */
    'permissions' => [
        'list_all' => ['_superadmin', '_user-editor'],
        'list_by_context' => [],
        'edit' => ['_superadmin', '_user-editor'],
        'add' => ['_superadmin', '_user-editor'],
        'delete' => ['_superadmin', '_user-editor'],
    ]
    
    
    
   
        
];