<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // Basic Info
            if (!Schema::hasColumn('projects', 'location')) {
                $table->string('location')->nullable()->after('slug');
            }

            if (!Schema::hasColumn('projects', 'type')) {
                $table->string('type')->nullable()->after('location');
            }

            if (!Schema::hasColumn('projects', 'timeline')) {
                $table->string('timeline')->nullable()->after('type');
            }

            // Content Fields as longText
            if (!Schema::hasColumn('projects', 'description')) {
                $table->longText('description')->nullable()->after('timeline');
            } else {
                $table->longText('description')->nullable()->change();
            }

            if (!Schema::hasColumn('projects', 'objectives')) {
                $table->longText('objectives')->nullable()->after('description');
            } else {
                $table->longText('objectives')->nullable()->change();
            }

            if (!Schema::hasColumn('projects', 'solution')) {
                $table->longText('solution')->nullable()->after('objectives');
            } else {
                $table->longText('solution')->nullable()->change();
            }

            if (!Schema::hasColumn('projects', 'technical_details')) {
                $table->longText('technical_details')->nullable()->after('solution');
            } else {
                $table->longText('technical_details')->nullable()->change();
            }

            if (!Schema::hasColumn('projects', 'results')) {
                $table->longText('results')->nullable()->after('technical_details');
            } else {
                $table->longText('results')->nullable()->change();
            }

            if (!Schema::hasColumn('projects', 'testimonial')) {
                $table->longText('testimonial')->nullable()->after('results');
            } else {
                $table->longText('testimonial')->nullable()->change();
            }

            // Media
            if (!Schema::hasColumn('projects', 'image')) {
                $table->string('image')->nullable()->after('testimonial');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $columns = [
                'location',
                'type',
                'timeline',
                'description',
                'objectives',
                'solution',
                'technical_details',
                'results',
                'testimonial',
                'image'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('projects', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
