<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id(); // Primary key: auto-incrementing ID
            $table->string('setting_key')->unique(); // The key for the setting, e.g., 'site_name'
            $table->text('setting_value'); // The value of the setting, e.g., 'My Awesome Website'
            $table->string('setting_type', 50); // Type of the setting (e.g., 'text', 'image', 'url')
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
