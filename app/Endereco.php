<?php namespace CepBR;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'enderecos';

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function bairro()
	{
		return $this->belongsTo('CepBR\Bairro');
	}

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function logradouro()
	{
		return $this->belongsTo('CepBR\Logradouro');
	}

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function cidade()
	{
		return $this->belongsTo('CepBR\Cidade');
	}

}
