<?php

return [
    'list' => [
        'toolbar' => [
            'buttons' => [
		        'create' => [
		            'label' => 'lang:admin::lang.button_new',
		            'class' => 'btn btn-primary',
		            'href' => 'cupnoodles/sitemessages/messages/create',
		        ],
                'layouts' => [
                    'label' => lang('cupnoodles.sitemessages::default.layouts'),
                    'class' => 'btn btn-default',
                    'href' => 'cupnoodles/sitemessages/layouts'
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
                    'href' => 'cupnoodles/sitemessages/messages/edit/{message_id}',
                ],
            ],
            'name' => [
                'label' => 'lang:cupnoodles.sitemessages::default.messages_name',
                'type' => 'text',
                'sortable' => TRUE,
            ],
        ],
    ],

    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => ['label' => 'lang:admin::lang.button_icon_back', 'class' => 'btn btn-default', 'href' => 'cupnoodles/sitemessages/messages'],
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
                'label' => 'lang:cupnoodles.sitemessages::default.message_name',
                'type' => 'text',
				'span' => 'left',
            ],
            'layout_id' => [
                'label' => 'lang:cupnoodles.sitemessages::default.layout',
                'type' => 'select',
                'relation' => 'layouts',

            ],
            'date_begin' => [
                'label' => 'lang:cupnoodles.sitemessages::default.begin_date',
                'type' => 'datepicker',
                'mode' => 'date',
                'span' => 'right',
                'cssClass' => 'flex-width',
            ],
            'date_end' => [
                'label' => 'lang:cupnoodles.sitemessages::default.end_date',
                'type' => 'datepicker',
                'mode' => 'date',
                'span' => 'right',
                'cssClass' => 'flex-width',
            ],
            'status' => [
                'label' => 'lang:admin::lang.label_status',
                'type' => 'switch',
                'default' => 1,
            ],
            'html' => [
                'label' => 'lang:cupnoodles.sitemessages::default.template',
                'type' => 'textarea',
                'attributes' => [
                    'rows' => 40
                ],
                'commentAbove' => 'lang:cupnoodles.sitemessages::default.message_usage'
            ]
		]
    ]
];
