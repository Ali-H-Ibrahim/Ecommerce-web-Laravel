<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'messages',


    ];


    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'App\Models\UserSystemNotification',
            'notification_id', 'user_id','id', 'id');
    }
    public function notificationsNewUser()
    {
        return $this->hasMany(UserSystemNotification::class, 'user_id', 'id');

    }



}
