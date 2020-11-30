<?php


namespace App\Repository;


use App\Channel;
use App\ChannelUser;
use App\ChannelUsersMessage;
use App\User;

class UserChannelRepository implements IUserChannelRepository
{

    public function getCustomerUsers()
    {
        return User::get();
    }

    public function find($id)
    {
        return User::with([
            'channels',
            'channels.channel',
            'channels.messages',
        ])->findOrFail($id);
    }

    public function createCustomer($userData)
    {
        $user = new User();
        $user->fill($userData);
        $user->type = 'customer';
        $user->saveOrFail();

        return $user;
    }

    public function getUserChannels()
    {
        // TODO: Implement getUserChannels() method.
    }

    public function getChannelBySlug($slug)
    {
        return Channel::where('slug', $slug)->first();
    }

    public function userChannelExists(User $user, Channel $channel, string $identifier)
    {
        return ChannelUser::where('channel_id', $channel->id)
            ->where('identifier', $identifier)
            ->exists();
    }

    public function createUserChannel(User $user, Channel $channel, string $identifier)
    {
        $channelUser = new ChannelUser();
        $channelUser->user_id = $user->id;
        $channelUser->channel_id = $channel->id;
        $channelUser->identifier = $identifier;
        $channelUser->timestamps = false;
        $channelUser->saveOrFail();

        return $channelUser;
    }

    public function joinChannel(ChannelUser $channelUser)
    {
        $this->addMessage($channelUser, 'Canal de comunicação aberto.', 'Usuário disponibilizou este canal');
    }

    public function addMessage(ChannelUser $channelUser, $title, $message = null)
    {
        $userMessage = new ChannelUsersMessage();
        $userMessage->title = $title;
        $userMessage->message = $message;
        $userMessage->channel_user_id = $channelUser->id;
        $userMessage->user_id = $channelUser->user_id;
        $userMessage->saveOrFail();

        return $userMessage;
    }
}