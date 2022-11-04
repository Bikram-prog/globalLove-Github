<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMetaStatus extends Model
{
    use HasFactory;
    protected $table = 'users_metas_status';

    protected $fillable = [
        'user_id',
        'metas_field_name',
        'metas_old_value',
        'metas_new_value',
        'status'
    ];
}
