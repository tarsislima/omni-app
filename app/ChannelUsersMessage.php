<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ChannelUsersMessage extends Model
{
    //
    public $table = "channel_users_messages";
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getCreatedAtAttribute()
    {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

}
