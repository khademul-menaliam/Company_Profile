<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('company_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            // messages, about, history, philosophy, strength
            $table->string('type')->nullable();
            // ceo, advisor, director, manager
            // CONTENT
            $table->string('title');
            $table->string('subtitle')->nullable(); // CEO, Senior Advisor
            $table->string('name')->nullable();     // Person name
            $table->text('content');
            $table->string('image')->nullable();

            // CONTROL
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_sections');
    }
};
