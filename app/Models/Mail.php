<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $fillable=[
        'send_user_id',
        'recieve_user_id',
        'text',
        'delete_at_time',
    ];

    public function departmentsInfo(){
        return $this->belongsTo(User::class,'send_user_id','id');
    }

}
