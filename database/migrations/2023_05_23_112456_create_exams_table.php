<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('slug');
            $table->string('start');
            $table->string('end');
            $table->string('time');
            $table->integer('degree');
            $table->enum('exam_type', ['True&False','Choices','Asiyes']);
            $table->boolean('active')->default(false);
            $table->boolean('close')->default(false);
            $table->unsignedInteger('limit_questions');
            $table->boolean('auto_answer')->default(false);
            $table->foreignId('admin_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
