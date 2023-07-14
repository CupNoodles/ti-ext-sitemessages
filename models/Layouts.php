<?php

namespace CupNoodles\SiteMessages\Models;


use Model;

use System\Models\Pages_model;

use Admin\Models\Locations_model;


use Illuminate\Support\Facades\Log;
use Main\Classes\MainController;

use Main\Template\Layout as LayoutTemplate;

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

    public static function getLayouts(){
        
        $layouts = [];
        $controller = MainController::getController() ?: new MainController;

        foreach ($controller->getTheme()->listLayouts() as $layout){
            
            $layouts[str_replace('.blade.php', '', $layout->fileName)] = $layout->description;
	    };

        return $layouts;

    }
}
