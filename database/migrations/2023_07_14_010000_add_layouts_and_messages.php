<?php

namespace CupNoodles\SiteMessages\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Schema;
use File;

/**
 * 
 */
class AddLayoutsAndMessages extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('cupnoodles_sitemessages_layouts')) {
            Schema::create('cupnoodles_sitemessages_layouts', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('layout_id');
                $table->string('name');
                $table->enum('type', ['Header', 'Footer', 'Modal', 'Inline']);
                $table->enum('repeat_mode', ['always', 'once']);
                $table->mediumText('pages');
                $table->text('html');
            });
        }

        if (!Schema::hasTable('cupnoodles_sitemessages_messages')) {
            Schema::create('cupnoodles_sitemessages_messages', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('message_id');
                $table->integer('layout_id');
                $table->string('name');
                $table->datetime('date_begin');
                $table->datetime('date_end');
                $table->text('html');
                $table->boolean('status');
            });
        }

        $this->addExampleLayouts();

    }

    public function down()
    {
        Schema::dropIfExists('cupnoodles_sitemessages_layouts');
        Schema::dropIfExists('cupnoodles_sitemessages_message');



        /*
        Schema::dropIfExists('cupnoodles_starcloudprnt_printers');
        Schema::dropIfExists('cupnoodles_starcloudprnt_layouts');
        Schema::dropIfExists('cupnoodles_starcloudprnt_printers_to_layouts');
        Schema::dropIfExists('cupnoodles_starcloudprnt_print_queue');

        if (Schema::hasColumn('menus', 'cloudprnt_kitchen_name'))
        {
	        Schema::table('menus', function (Blueprint $table) {
	            $table->dropColumn('cloudprnt_kitchen_name');
	        });  
        }

        if (Schema::hasColumn('menus', 'cloudprnt_front_name'))
        {
	        Schema::table('menus', function (Blueprint $table) {
	            $table->dropColumn('cloudprnt_front_name');
	        });  
        }
        */

    }

    protected function addExampleLayouts()
    {

        /*
        Layouts::create([
            'name' => 'Kitchen Ticket',
            'receiptline' => File::get(extension_path('cupnoodles/starcloudprnt/'). 'example_layouts/kitchen.txt'),
            'cpl' => '48',
            'encoding' => 'multilingual',
            'gradient' => true,
            'gamma' => '1.8',
            'threshold' => '128',
            'upsideDown' => false,
            'spacing' => false,
            'cutting' => true,
        ]);

        Layouts::create([
            'name' => 'Customer Receipt',
            'receiptline' => File::get(extension_path('cupnoodles/starcloudprnt/'). 'example_layouts/customer.txt'),
            'cpl' => '48',
            'encoding' => 'multilingual',
            'gradient' => true,
            'gamma' => '1.8',
            'threshold' => '128',
            'upsideDown' => false,
            'spacing' => false,
            'cutting' => true,
        ]);
        */

    }


}
