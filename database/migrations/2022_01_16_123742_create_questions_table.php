<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text("title_eng")->nullable();
            $table->text("title_urdu")->nullable();

            $table->text("key_eng")->nullable();
            $table->text("key_urdu")->nullable();
            $table->text("meta")->nullable();

            $table->integer("heading_id")->nullable();
            $table->integer("sub_heading_id")->nullable();
            $table->integer("step_no")->nullable();
            $table->string("q_type")->nullable();
            $table->integer("sort_by")->nullable();
            $table->string("status")->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
