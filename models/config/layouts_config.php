<?php

return [
    'list' => [
        'toolbar' => [
            'buttons' => [
		        'create' => [
		            'label' => 'lang:admin::lang.button_new',
		            'class' => 'btn btn-primary',
		            'href' => 'cupnoodles/sitemessages/layouts/create',
		        ],
                'messages' => [
                    'label' => lang('cupnoodles.sitemessages::default.messages'),
                    'class' => 'btn btn-default',
                    'href' => 'cupnoodles/sitemessages/messages'
                ],
                'delete' => ['label' => 'lang:admin::lang.button_delete', 'class' => 'btn btn-danger', 'data-request-form' => '#list-form', 'data-request' => 'onDelete', 'data-request-data' => "_method:'DELETE'", 'data-request-data' => "_method:'DELETE'", 'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm']
            
			],
        ],
		'filter' => [],
        'columns' => [
            'edit' => [
                'type' => 'button',
                'iconCssClass' => 'fa fa-pencil',
                'attributes' => [
                    'class' => 'btn btn-edit',
                    'href' => 'cupnoodles/sitemessages/layouts/edit/{layout_id}',
                ],
            ],
            'name' => [
                'label' => 'lang:cupnoodles.sitemessages::default.layout_name',
                'type' => 'text',
                'sortable' => TRUE,
            ],
        ],
    ],

    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => ['label' => 'lang:admin::lang.button_icon_back', 'class' => 'btn btn-default', 'href' => 'cupnoodles/sitemessages/layouts'],
                'save' => [
                    'label' => 'lang:admin::lang.button_save',
                    'class' => 'btn btn-primary',
                    'data-request' => 'onSave',
                ],
                'saveClose' => [
                    'label' => 'lang:admin::lang.button_save_close',
                    'class' => 'btn btn-default',
                    'data-request' => 'onSave',
                    'data-request-data' => 'close:1',
                ],
            ],
        ],
		'fields' => [
            'name' => [
                'label' => 'lang:cupnoodles.sitemessages::default.layout_name',
                'type' => 'text',
				'span' => 'left',
            ],
            'type' => [
                'label' => 'lang:cupnoodles.sitemessages::default.layout_type',
                'type' => 'select',
                'default' => 'Modal',
                'options' => ['Modal' => 'Modal', 'Header' => 'Header', 'Footer' => 'Footer', 'Inline' => 'Inline'],
            ],
            'repeat_mode' => [
                'label' => 'lang:cupnoodles.sitemessages::default.repeat_mode',
                'type' => 'select',
                'default' => 'always',
                'options' => ['Always show on load' => 'always', 'Hide once closed' => 'once'],
            ],
            'pages' => [
                'label' => 'lang:cupnoodles.sitemessages::default.pages',
                'type' => 'selectlist',
                'options' => \CupNoodles\SiteMessages\Models\Layouts::getLayouts(),
                'default' => [],
            ],
            'html' => [
                'label' => 'lang:cupnoodles.sitemessages::default.template',
                'type' => 'textarea',
                'attributes' => [
                    'rows' => 40
                ],
                'commentAbove' => 'lang:cupnoodles.sitemessages::default.layout_usage'
            ]
		]
    ]
];
