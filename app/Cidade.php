<?php namespace CepBR;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cidades';

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function enderecos()
	{
		return $this->hasOne('CepBR\Endereco');
	}

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function estado()
	{
		return $this->belongsTo('CepBR\Estado');
	}

}
