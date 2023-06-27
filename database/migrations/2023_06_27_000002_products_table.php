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
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->foreignId('company_id')->constrained('companies');
			$table->string('product_name');
			$table->integer('price')->nullable();
			$table->integer('stock')->nullable();
			$table->string('comment')->nullable();
			$table->string('img_path')->nullable();
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
		//Schema::dropIfExists('products');
		Schema::drop('products');
	}
};
