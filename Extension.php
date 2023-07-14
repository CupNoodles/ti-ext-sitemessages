<?php 

namespace CupNoodles\SiteMessages;

use System\Classes\BaseExtension;
use System\Classes\ExtensionManager;

class Extension extends BaseExtension
{
    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }
    /**
     * Registers any admin permissions used by this extension.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'Admin.SiteMessages' => [
                'label' => 'cupnoodles.extravars::default.permissions',
                'group' => 'admin::lang.permissions.name',
            ],
        ];
    }


    public function registerNavigation()
    {
        return [
            'design' => [
                'child' => [
                    'extravars' => [
                        'priority' => 90,
                        'class' => 'sitemessages',
                        'href' => admin_url('cupnoodles/sitemessages/messages'),
                        'title' => lang('cupnoodles.sitemessages::default.side_menu'),
                        'permission' => 'Admin.SiteMessages',
                    ],
                ],
            ],
        ];
    }
}
