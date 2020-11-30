<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Repository\UserChannelRepository;
use App\Services\UserChannelsService;
use Illuminate\Http\Response;


class UsersController extends Controller
{
    public function __construct(UserChannelsService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json($this->userService->getCustomerUsers());
    }

    public function create(CreateUserRequest $request)
    {
        $userdata = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'cep' => $request->get('cep'),
            'address' => $request->get('address'),
            'channels' => $request->get('channels')
        ];

        \DB::beginTransaction();
        try {
            $user = $this->userService->createCustomer($userdata, $request->get('channels'));
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();

            if ($e instanceof \ErrorException) {
                abort(Response::HTTP_BAD_REQUEST, $e->getMessage());
            }
            abort(Response::HTTP_BAD_REQUEST, 'Não foi possivel salvar o usuário ' . $e->getMessage());
        }

        return response()->json($user);
    }

    public function show(UserChannelRepository $repository, $id)
    {
        $user = $repository->find($id);
        return response()->json($user);
    }
}
