<?php

namespace CupNoodles\SiteMessages\Controllers;

use AdminMenu;

class Messages extends \Admin\Classes\AdminController
{
    public $implement = [
        'Admin\Actions\ListController',
        'Admin\Actions\FormController'
    ];

    public $listConfig = [
        'list' => [
            'model' => 'CupNoodles\SiteMessages\Models\Messages',
            'title' => 'cupnoodles.sitemessages::default.messages',
            'emptyMessage' => 'cupnoodles.sitemessages::default.text_empty',
            'defaultSort' => ['message_id', 'DESC'],
            'configFile' => 'messages_config',
        ],
    ];

    public $formConfig = [
        'name' => 'cupnoodles.sitemessages::default.messages',
        'model' => 'CupNoodles\SiteMessages\Models\Messages',
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'cupnoodles/sitemessages/messages/edit/{message_id}',
            'redirectClose' => 'cupnoodles/sitemessages/messages',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'cupnoodles/sitemessages/messages/edit/{message_id}',
            'redirectClose' => 'cupnoodles/sitemessages/messages',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'cupnoodles/sitemessages/messages',
        ],
        'delete' => [
            'redirect' => 'cupnoodles/sitemessages/messages',
        ],
        'configFile' => 'messages_config',
    ];

    //protected $requiredPermissions = 'Admin.UnitsOfMeasure';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('design', 'sitemessages');
    }



}
