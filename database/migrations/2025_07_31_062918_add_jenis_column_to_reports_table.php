<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            // Add jenis column if it doesn't exist
            if (!Schema::hasColumn('reports', 'jenis')) {
                $table->string('jenis')->default('Keputusan Kepala OPD')->after('id');
            }
            // Add label column if it doesn't exist
            if (!Schema::hasColumn('reports', 'label')) {
                $table->string('label')->nullable()->after('jenis');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['jenis', 'label']);
        });
    }
};
