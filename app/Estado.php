<?php namespace CepBR;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estados';

	/**
	 * The relationship used by the model.
	 *
	 * @return object
	 */
	public function cidades()
	{
		return $this->hasOne('CepBR\Cidade');
	}

}
