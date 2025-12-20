<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name of the partner
            $table->text('description')->nullable(); // Description of the partner
            $table->string('website_url')->nullable(); // Website URL of the partner
            $table->string('email')->nullable(); // Email of the partner
            $table->string('phone')->nullable(); // Phone number of the partner
            $table->string('logo')->nullable(); // Path to the partner's logo (optional)
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the partner
            $table->timestamps(); // Created at & updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
