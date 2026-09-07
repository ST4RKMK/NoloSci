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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('type')->nullable();
            $table->foreignIdFor(\App\Models\Public\Client::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Public\Rent::class)->nullable()->constrained();

            $table->foreignIdFor(\App\Models\Admin\Catalog::class)->nullable()->constrained();
            $table->smallInteger('index')->nullable();

            $table->boolean('active')->default(false);
            $table->datetime('available_from')->nullable();
            $table->datetime('available_to')->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
