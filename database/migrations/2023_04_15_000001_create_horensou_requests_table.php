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
        Schema::create('horensou_requests', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('priority_id');
            $table->string('point_problem');
            $table->text('detail_problem');
            $table->string('part_name');
            $table->unsignedBigInteger('request_by');
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->string('shop_status');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('category_id')->references('id')->on('horensou_categories');
            $table->foreign('priority_id')->references('id')->on('horensou_priorities');
            $table->foreign('request_by')->references('id')->on('users');
            $table->foreign('approve_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horensou_requests');
    }
};
