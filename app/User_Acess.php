<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Acess extends Model
{
    //

    protected $fillable = ['last_login'];
    protected $table = "users_acess";

    public function User()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }

    public function dateFirst($date){
        return $this->where('last_login', '>=' , $date);
    }
}
