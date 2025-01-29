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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->unsignedInteger('stock')->default(0);
            $table->string('image')->default('defaultPic.png');
            $table->foreignId('age_category_id');
            $table->foreign('age_category_id')->references('id')->on('age_categories')->onDelete('CASCADE')->onUpdate('CASCADE')->index();
            $table->foreignId('sales_category_id')->references('id')->on('sales_categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->decimal('discount', 10, 2)->default(0.0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
