<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSystemNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_id',
        'user_id',
        'new'

    ];

    public function systemNotification()
    {
        return $this->belongsTo(SystemNotification::class, 'notification_id', 'id');
    }
}
