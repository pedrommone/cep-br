<?php namespace CepBR\Http\Controllers;

use Illuminate\Routing\Controller;
use CepBR\Endereco;
use Response;
use Input;

class HomeController extends Controller {

	/**
	 * @Get("v1/endereco/{id}", as="procuraCep")
	 */
	public function getByCep($cep)
	{
		try {
			$endereco = Endereco::with([
					'Cidade', 'Logradouro', 'Bairro'
				])
				->findOrFail($cep);

			return Response::json([
				'endereco' => [
					'logradouro' => $endereco->logradouro->nome,
					'bairro' => $endereco->bairro->nome,
					'cidade' => $endereco->cidade->nome,
					'estado' => $endereco->cidade->estado->nome,
					'uf' => $endereco->cidade->estado->uf,
					'cep' => $endereco->id
				]
			])->setCallback(Input::get('callback'));;
		}
		catch (Exception $e)
		{

		}
	}

	/**
	 * @Get("/")
	 */
	public function index()
	{
		return "hi";
	}

}
