<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = ['name','email','active'];

    protected $table = "users";

    /**
     * Relacionamento com a tabela de acessos dos usuarios.
     */
    public function UserAcess()
    {
        return $this->hasMany('App\User_acess', 'user_id', 'id');
    }

    /**
     * Realiza a contabilização de acessos dos usuarios
     */
    public function getCountUserAcess(){
        return $this->hasMany('App\User_acess')->whereUserId($this->id);
    }

    /**
     * Realiza consulta com os filtros em tela.
     */
    public function getUserFilter(array $data, $totalPage,$orderBy = 'asc'){
        return   $this->where(function ($query) use ($data){
                //Filtro de nome
                if(isset($data['name']))
                    $query->where('name','like',$data['name'].'%');
                //Filtro de e-mail
                if(isset($data['email']))
                    $query->where('email','like','%'.$data['email'].'%');
                //Filtro de Status
                if(isset($data['active']))
                    $query->where('active',$data['active']);

                })/*->whereHas('UserAcess',function($query) use ($data){
                    //Filtro relacionado a tabela de acesso dos usuarios.

                    //Data Inicial - Igual ou Acima de...
                    if(isset($data['dateFirst']))
                        $query->where('last_login' , '>=' ,$data['dateFirst']);

                    //Data Final - Menor ou igual de...
                    if(isset($data['dateEnd']))
                        $query->where('last_login' , '<=' ,$data['dateEnd']);
            })*/->leftJoin('users_acess as ua',function($query) use($data){
                    $query->on('ua.user_id','id');

                     //Data Inicial - Igual ou Acima de...
                     if(isset($data['dateFirst']))
                     $query->where('ua.last_login' , '>=' ,$data['dateFirst']);

                 //Data Final - Menor ou igual de...
                 if(isset($data['dateEnd']))
                     $query->where('ua.last_login' , '<=' ,$data['dateEnd']);


            } )->select('user.*','ua.last_login')->orderBy('name',$orderBy)//->toSql();
            //dd($return);
            ->paginate($totalPage);
    }

    public function getTopsUserAcess(array $data, $totalPage){
        $return =  $this->where(function ($query) use ($data){

        })->orderBy()->paginate($totalPage);
    }
}
