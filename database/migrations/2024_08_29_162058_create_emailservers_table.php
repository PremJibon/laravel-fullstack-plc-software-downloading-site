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
        Schema::create('emailservers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string("MAIL_MAILER");
            $table->string("MAIL_HOST");
            $table->unsignedInteger("MAIL_PORT");
            $table->string("MAIL_USERNAME");
            $table->string("MAIL_PASSWORD");
            $table->string("MAIL_ENCRYPTION");
            $table->string("MAIL_FROM_ADDRESS");
            $table->string("MAIL_FROM_NAME")->default(get_settings('app_name'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emailservers');
    }
};
