<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Schema table name to migrate
     *
     * @var string
     */
    private $set_schema_table = 'questions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('text');
            $table->unsignedInteger('views')->default(0);
            $table->integer('votes')->default(0);
            $table->unsignedInteger('answers')->default(0);
            $table->unsignedInteger('best_answer_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->index('user_id');

            $table->unique('slug');

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
            $table->dropForeign('user_id');

            $table->dropUnique('slug');

            $table->dropIndex('user_id');
        });

        Schema::dropIfExists($this->set_schema_table);
    }
}
