<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsModulesFrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_modules_fronts', function (Blueprint $table) {
            $table->id();
            $table->string('frontEmail');
            $table->string('frontPhone');
            $table->string('FrontLogo');
            $table->string('frontBanner');
            $table->string('aboutTitle');
            $table->string('aboutDesc');
            $table->string('primaryColor');
            $table->string('secondaryColor');
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
        Schema::dropIfExists('cms_modules_fronts');
    }
}
