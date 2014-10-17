<?php namespace CepBR;

use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logradouros';

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function enderecos()
	{
		return $this->hasOne('CepBR\Endereco');
	}

}
