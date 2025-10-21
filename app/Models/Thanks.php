<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanks extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_user_id',
        'receive_user_id',
        'text',
        'delete_at',
    ];

    //ユーザー
    public function receiveUser()
    {
        return $this->belongsTo(User::class, 'receive_user_id', 'id');
    }

    public function sendUser()
    {
        return $this->belongsTo(User::class, 'send_user_id', 'id');
    }
}
