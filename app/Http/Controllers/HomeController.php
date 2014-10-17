<?php namespace CepBR\Http\Controllers;

use Illuminate\Routing\Controller;
use CepBR\Endereco;
use Exception;
use Response;
use Input;

class HomeController extends Controller {

	/**
	 * @Get("v1/endereco/{id}", as="procuraCep")
	 */
	public function getByCep($cep)
	{
		$response = [];

		try
		{
			$endereco = Endereco::with([
					'Cidade', 'Logradouro', 'Bairro'
				])
				->whereId($cep)
				->first();

			if (! $endereco)
				throw new Exception('Cep not found, trying get from Correios.');

			$response = [
				'endereco' => [
					'logradouro' => $endereco->logradouro->nome,
					'bairro' => $endereco->bairro->nome,
					'cidade' => $endereco->cidade->nome,
					'estado' => $endereco->cidade->estado->nome,
					'uf' => $endereco->cidade->estado->uf,
					'cep' => $endereco->id
				]
			];
		}
		catch (Exception $e)
		{
			return var_dump($e->getMessage());
		}

		return Response::json($response)
			->setCallback(Input::get('callback'));
	}

	/**
	 * @Get("/")
	 */
	public function index()
	{
		return "hi";
	}

}
