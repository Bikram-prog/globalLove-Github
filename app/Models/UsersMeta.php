<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMeta extends Model
{
    use HasFactory;
    protected $table = 'users_metas';

    protected $fillable = [
        'user_id',
        'sex',
        'looking_for',
        'dob'
    ];
}
