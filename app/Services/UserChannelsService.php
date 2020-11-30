<?php


namespace App\Services;

use App\Repository\UserChannelRepository;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserChannelsService
{
    /** @var IUserChannelRepository */
    protected $repository;

    public function __construct(UserChannelRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * @return Collection
     */
    public function getCustomerUsers()
    {
        return $this->repository->getCustomerUsers();
    }

    /**
     * Cria um novo usuário cliente
     *
     * @param array $userData
     * @param array $channels
     * @return mixed
     */
    public function createCustomer(array $userData, array $channels = [])
    {
        $user = $this->repository->createCustomer($userData);

        foreach ($channels as $channel => $identifier) {
            if (!is_null($identifier)) {
                $this->joinChannel($user, $channel, $identifier);
            }
        }

        return $user;
    }

    /**
     * Inicializa o canal de comunicação aberto pelo usuário
     *
     * @param User $user
     * @param $channelSlug
     * @param string $identifier
     */
    public function joinChannel(User $user, $channelSlug, string $identifier)
    {
        $channel = $this->repository->getChannelBySlug($channelSlug);
        if (!$channel) {
            throw new \ErrorException("Canal $channelSlug não encontrado.");
        }

        if ($this->repository->userChannelExists($user, $channel, $identifier)) {
            throw new \ErrorException("{$channel->name} informado já existe!");
        }

        $userChannel = $this->repository->createUserChannel($user, $channel, $identifier);
        $this->repository->joinChannel($userChannel);
    }
}