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
        Schema::create('secrets', function (Blueprint $table) {
            $table->id();
            $table->string('STRIPE_KEY')->default("pk_test_51PkRRP2MBhGS3IWFTGLplKKcFukYg76dRAzhXsMXSjjSaQDNdW3dgabblGZcQx7U1SVd1LDkVdoR9BgIdThPw5jz00hNF4xZys");
            $table->string('STRIPE_SECRET')->default("sk_test_51PkRRP2MBhGS3IWFuILywGk7MQEDL5OX12gA0cx6WMkaXLtKovvyChIdXvS6ppLp0ey3EXddWuv7DbvhaRL0XKH300OKdrnX5I");
            $table->string('STRIPE_WEBHOOK')->default("whsec_tD6SfoYoo8PR2QJSKQ6thGr08CeCq9qX");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secrets');
    }
};
