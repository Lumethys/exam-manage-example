<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('group_profile', function (Blueprint $table) {
            $table->id();
            $table->foreign("profile_id")->reference('profiles')->on('id');
            $table->foreign("group_id")->reference('groups')->on('id');
            $table->integer("position");
            $table->timestamps();

            $table->unique(['profile_id', 'group_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_profile');
    }
};
