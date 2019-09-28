<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosedQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closed_questions', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->boolean('value');

            $table->unsignedBigInteger('id_votes');
            $table->foreign('id_votes')
                ->references('id')
                ->on('votes')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('closed_answers');
    }
}
