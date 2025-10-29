<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngword extends Model
{
    use HasFactory;

    protected $table = 'ng_words';
    protected $fillable = [
        'word',
    ];
}
