<?php

namespace App\Http\Controllers;

use App\Exceptions\CepException;
use App\Http\Requests\CreateUserRequest;
use App\Services\CepService;
use App\Services\UserChannelsService;
use Illuminate\Http\Response;


class CepController extends Controller
{
    public function __construct(UserChannelsService $userService)
    {
        $this->userService = $userService;
    }

    public function show(CepService $cepService, $cep)
    {
        try {
            $address = $cepService->getAddressByCep($cep);
        } catch (CepException $e) {
            abort(Response::HTTP_BAD_REQUEST, $e->getMessage());
        } catch (\Exception $e) {
            abort(Response::HTTP_BAD_REQUEST, 'Não foi possível consultar o CEP.');
        }

        return response()->json($address);
    }
}
