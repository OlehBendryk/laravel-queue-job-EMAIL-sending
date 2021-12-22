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
            $table->unsignedInteger('msg_template');
            $table->dateTime('send_at')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('msg_template')->references('id')->on('msg_templates');
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
