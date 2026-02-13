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
        Schema::create('offer', function (Blueprint $table) {
            $table->id();
            $table->string("title", 100);
            $table->text("body");
            $table->string("location", 100);
            $table->integer("type_id");
            $table->timestamps();

            $table->foreign("type_id")->references("id")->on("jobtypes");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer');
    }
};
