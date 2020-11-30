<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelUser extends Model
{
    public $table = "channels_users";

    //public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(ChannelUsersMessage::class, 'channel_user_id', 'id');
    }
}
