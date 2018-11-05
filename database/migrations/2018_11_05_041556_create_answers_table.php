<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Schema table name to migrate
     *
     * @var string
     */
    private $set_schema_table = 'answers';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('user_id');
            $table->text('text');
            $table->integer('votes_count')->default(0);
            $table->timestamps();

            $table->index('question_id');
            $table->index('user_id');

            $table->foreign('question_id')
                ->references('id')->on('questions')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->set_schema_table, function (Blueprint $table) {
            $table->dropForeign('question_id');
            $table->dropForeign('user_id');

            $table->dropIndex('question_id');
            $table->dropIndex('user_id');
        });

        Schema::dropIfExists($this->set_schema_table);
    }
}
