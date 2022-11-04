<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersReport extends Model
{
    use HasFactory;
    protected $table = 'report_users';
    public $timestamps = true;

    protected $fillable = [
        'r_id',
        'r_who_id',
        'r_user_id',
        'created_at',
        'updated_at',
        'r_comments',
        'r_status'
    ];
}
