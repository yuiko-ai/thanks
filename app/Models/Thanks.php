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
        'recieve_user_id',
        'text',
        'deleted_at',
    ];

    //ユーザー
    public function user()
    {
        return $this->belongsTo(User::class, 'send_user_id', 'id');
    }
}
