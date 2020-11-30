<?php


namespace App\Services;


use App\Exceptions\CepException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class CepService implements CepInterface
{

    public function __construct(Http $httpClient)
    {
        $options = ['base_uri' => 'https://viacep.com.br/ws/'];

        $this->client = $httpClient::withOptions($options);
    }

    public function getAddressByCep(string $cep)
    {
        $response = $this->client->get($cep . '/json');
        $result = $response->json();

        if ($response->status() != Response::HTTP_OK) {
            throw new CepException('Não foi possível consultar o CEP.');
        }

        if (isset($result['erro'])) {
            throw new CepException("CEP inexistente");
        }

        return $result['logradouro'] . ' ' . $result['bairro'] . ' ' . $result['localidade'] . ' - ' . $result['uf'];
    }
}