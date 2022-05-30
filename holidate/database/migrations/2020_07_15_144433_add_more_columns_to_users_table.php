<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('users_role')->nullable();
            $table->string('social_network_profile')->nullable();
            $table->string('phone')->nullable();
            $table->string('web')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('professional_category_id')->unsigned()->nullable();
            $table->foreign('professional_category_id')->references('id')->on('professional_categories')->onDelete('cascade');    
            $table->integer('languages_id')->nullable();
            $table->integer('age')->nullable();
            $table->string('current_company')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('hosted_at')->nullable(); 
            $table->string('vacation_city')->nullable();
            $table->string('city')->nullable();
            $table->string('from_to')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('status')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->integer('score')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
