<?php

namespace CupNoodles\SiteMessages\Controllers;

use AdminMenu;

class Layouts extends \Admin\Classes\AdminController
{
    public $implement = [
        'Admin\Actions\ListController',
        'Admin\Actions\FormController'
    ];

    public $listConfig = [
        'list' => [
            'model' => 'CupNoodles\SiteMessages\Models\Layouts',
            'title' => 'cupnoodles.sitemessages::default.layouts',
            'emptyMessage' => 'cupnoodles.sitemessages::default.text_empty',
            'defaultSort' => ['layout_id', 'DESC'],
            'configFile' => 'layouts_config',
        ],
    ];

    public $formConfig = [
        'name' => 'cupnoodles.sitemessages::default.text_form_create_layout',
        'model' => 'CupNoodles\SiteMessages\Models\Layouts',
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'cupnoodles/sitemessages/layouts/edit/{layout_id}',
            'redirectClose' => 'cupnoodles/sitemessages/layouts',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'cupnoodles/sitemessages/layouts/edit/{layout_id}',
            'redirectClose' => 'cupnoodles/sitemessages/layouts',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'cupnoodles/sitemessages/layous',
        ],
        'delete' => [
            'redirect' => 'cupnoodles/sitemessages/layouts',
        ],
        'configFile' => 'layouts_config',
    ];


    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('design', 'sitemessages');
    }



}
