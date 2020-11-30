<?php


namespace App\Repository;


use App\Channel;
use App\ChannelUser;
use App\User;

interface IUserChannelRepository
{
    public function getCustomerUsers();

    public function createCustomer($userData);

    public function getUserChannels();

    public function userChannelExists(User $user, Channel $channel, string $identifier);

    public function createUserChannel(User $user, Channel $channel, string $identifier);

    public function getChannelBySlug($slug);

    public function joinChannel(ChannelUser $channelUser);

    public function addMessage(ChannelUser $channelUser, $title, $userMessage = null);

}