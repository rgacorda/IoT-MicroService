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
        Schema::create('features_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->date('expiry_date')->nullable();
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features_subscriptions');
    }
};
