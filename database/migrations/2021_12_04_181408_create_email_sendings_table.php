<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_sendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('msg_id');
            $table->timestamp('send_time');
            $table->boolean('processing')->default(true);
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('msg_id')->references('id')->on('msg_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_sendings');
    }
}
