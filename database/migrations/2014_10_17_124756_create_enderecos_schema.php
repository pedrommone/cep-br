<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosSchema extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enderecos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('cidade_id');
			$table->unsignedInteger('logradouro_id');
			$table->unsignedInteger('bairro_id');
			$table->timestamps();

			$table->foreign('cidade_id')
				->references('id')
				->on('cidades');

				$table->foreign('logradouro_id')
				->references('id')
				->on('logradouros');

				$table->foreign('bairro_id')
				->references('id')
				->on('bairros');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enderecos');
	}

}
