<?php

namespace CupNoodles\SiteMessages\Models;


use Model;

use System\Models\Pages_model;

use Admin\Models\Locations_model;


use Illuminate\Support\Facades\Log;

class Layouts extends Model
{

    /**
     * @var string The database table name
     */
    protected $table = 'cupnoodles_sitemessages_layouts';

    protected $primaryKey = 'layout_id';

    public $timestamps = FALSE;

    public $casts = [
        'pages' => 'serialize',
    ];

    public static function getPages(){
        
        $pages = [];
        $pages['home'] = 'Home';
        // Menu/Checkout for each location
        foreach (Locations_model::all() as $location){
	    	$pages[$location->permalink_slug . '/menus'] = $location->location_name . ' Menu';
            $pages[$location->permalink_slug . '/checkout'] = $location->location_name . ' Checkout';

	    };

        foreach(Pages_model::all() as $page){
            $pages[$page->permalink_slug] = $page->title;
        }

        return $pages;

    }
}
