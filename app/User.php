<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = ['name','email','active'];

    protected $table = "users";
    public $timestamps = false;

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
        return  $this->where(function ($query) use ($data){
                //Filtro de nome
                if(isset($data['name']))
                    $query->where('name','like',$data['name'].'%');
                //Filtro de e-mail
                if(isset($data['email']))
                    $query->where('email','like','%'.$data['email'].'%');
                //Filtro de Status
                if(isset($data['active']))
                    $query->where('active',$data['active']);

                })->whereHas('UserAcess',function($query) use ($data){
                    //Filtro relacionado a tabela de acesso dos usuarios.

                    //Data Inicial - Igual ou Acima de...
                    if(isset($data['dateFirst']))
                        $query->where('last_login' , '>=' ,$data['dateFirst']);

                    //Data Final - Menor ou igual de...
                    if(isset($data['dateEnd']))
                        $query->where('last_login' , '<=' ,$data['dateEnd']);
            })->withCount('UserAcess')->orderBy('name',$orderBy)->paginate($totalPage);

    }

    public function getTopUserAcess( $totalPage,$orderBy = 'desc'){
        return   $this->withCount('UserAcess')->orderBy('user_acess_count' , $orderBy)->orderBy('name','asc')->paginate(10);
        //dd($return);
    }
}
