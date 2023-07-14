<?php 

namespace CupNoodles\SiteMessages;

use System\Classes\BaseExtension;
use System\Classes\ExtensionManager;

use Event;
use System\Facades\Assets;
use Illuminate\Support\Facades\Log;

use CupNoodles\SiteMessages\Models\Messages;
use CupNoodles\SiteMessages\Models\Layouts
;
use Main\Template\Page;

class Extension extends BaseExtension
{
    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

        Event::listen('main.page.init', function($controller){
            
            // get active Site Messages
            $messages = Messages::join('cupnoodles_sitemessages_layouts', 'cupnoodles_sitemessages_messages.layout_id', '=', 'cupnoodles_sitemessages_layouts.layout_id')
            ->select('cupnoodles_sitemessages_layouts.html AS layout_html', 'cupnoodles_sitemessages_layouts.type', 'cupnoodles_sitemessages_layouts.pages' ,'cupnoodles_sitemessages_messages.*')
            ->where('status', 1)
            ->whereRaw('NOW() BETWEEN date_begin AND DATE_ADD(date_end, INTERVAL 1 day)')->get();
            
            foreach($messages as $message){

                foreach(unserialize($message->pages) as $page){
                    
                    if($page == $controller->getPage()->settings['layout']){
                        
                        // message is active for this layout

                        //generate html contents
                        $html = str_replace('MESSAGE_GOES_HERE', $message->html, $message->layout_html);
                        Assets::putJsVars(['sitemessages_type' => $message->type, 'sitemessages_html' => $html]);
                        Assets::addJS('extensions/cupnoodles/sitemessages/assets/js/sitemessages.js', 'cupnoodles-sitemessages-js');

                    }
                }
            }


        });
        
        
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
