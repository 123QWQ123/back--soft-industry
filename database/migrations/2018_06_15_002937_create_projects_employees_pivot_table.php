<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsEmployeesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_projects', function (Blueprint $table) {
            $table->integer('projects_id')->unsigned();
            $table->integer('employees_id')->unsigned();
            $table->primary(['projects_id', 'employees_id']);
            $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_projects');
    }
}
