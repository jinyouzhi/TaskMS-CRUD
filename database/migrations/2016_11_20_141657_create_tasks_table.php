<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('content');
            $table->text('rank')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        App\Task::create([
            'name' => '任务1',
            'content' => '完成CRUD',
            'rank' => '紧急',
            'notes' => '用世界上最好的语言'
        ]);
        App\Task::create([
            'name' => '任务2',
            'content' => '完成数据库实验三'
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
