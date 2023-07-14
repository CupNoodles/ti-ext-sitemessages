<?php

namespace CupNoodles\SiteMessages\Models;


use Model;
use CupNoodles\SiteMessages\Models\Layouts;
use Illuminate\Support\Facades\Log;
class Messages extends Model
{

    /**
     * @var string The database table name
     */
    protected $table = 'cupnoodles_sitemessages_messages';

    protected $primaryKey = 'message_id';

    public $timestamps = FALSE;

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'date_begin' => 'date',
        'date_end' => 'date',
    ];


    public static function getLayoutIdOptions()
    {
	    $layouts = [];
	    foreach (Layouts::all() as $layout){
	    	$layouts[$layout->layout_id] = $layout->name;
	    };
	    return $layouts;
    }

}
