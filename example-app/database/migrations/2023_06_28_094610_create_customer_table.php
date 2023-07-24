<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            // Cú pháp : $table->kdl('tên trường');
            $table->string('name',50); // Quy định độ dài của giá trị
            $table->string('email')->unique(); // Kiểm tra các giá trị ko trùng nhau
            $table->string('image')->nullable();
            $table->string('sdt',10)->unique();
            $table->date('date_of_birth');
            $table->string('address')->nullable();
            $table->tinyInteger('gender')->default(0); //Set giá trị mặc định
            $table->softDeletes();
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
        Schema::dropIfExists('customer');
    }
};
