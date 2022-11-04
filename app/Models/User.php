<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'facebook_id',
        'prfl_photo_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }


    public function getTotalUser()
    {

        $totaluser = DB::table('users')
            ->whereIn('prfl_approve_status',[0,1,2])
            ->count();

        return $totaluser;
    }


    public function getTotalUserChat()
    {

        $totaluserchat = DB::table('users_chat')
            ->count();

        return $totaluserchat;
    }

    public function getTotalUserLike()
    {

        $totaluserlike = DB::table('connectionsfinals')
            ->count();

        return $totaluserlike;
    }


    public function getTotalUserWomen()
    {
        $total = $this->getTotalUser();
        $totaluser = DB::table('users')
        ->join('users_metas', 'users.id', '=', 'users_metas.user_id')
        ->where('prfl_approve_status', '=', 1)
        ->where('sex', '=', 'Female')
        ->sum('prfl_approve_status');

        if($totaluser == 0){
            return 0;
        }

        return number_format(($totaluser/$total) * 100);
    }

    public function getTotalUserMen()
    {
        $total = $this->getTotalUser();
        $totaluser = DB::table('users')
        ->join('users_metas', 'users.id', '=', 'users_metas.user_id')
        ->where('prfl_approve_status', '=', 1)
        ->where('sex', '=', 'Male')
        ->sum('prfl_approve_status');

        if($totaluser == 0){
            return 0;
        }

        return number_format(($totaluser/$total) * 100);
    }

    public function getTotalUserTrans()
    {
        $total = $this->getTotalUser();
        $totaluser = DB::table('users')
        ->join('users_metas', 'users.id', '=', 'users_metas.user_id')
        ->where('prfl_approve_status', '=', 1)
        ->where('sex', '=', 'Gay')
        ->sum('prfl_approve_status');

        if($totaluser == 0){
            return 0;
        }

        return number_format(($totaluser/$total) * 100);
    }

}