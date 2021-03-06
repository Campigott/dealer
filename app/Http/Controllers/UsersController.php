<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserFilterFormRequest;

class UsersController extends Controller
{

    //
    public function index(){
        //Retorna com a contabilização de acessos.
        $usersData = User::withCount('UserAcess')->paginate(10);

        return view('users.index',['users' => $usersData]);
    }

    public static function pesquisa(Request $request, User $user){

       $UserDataFilter = $request->except('_token');

       if(isset($UserDataFilter['topAcess'])){
           $usersData = $user->getTopUserAcess(10,$UserDataFilter['topAcess']);

       }elseif(isset($UserDataFilter['lessAcess'])){
        $usersData = $user->getTopUserAcess(10,$UserDataFilter['lessAcess']);
       }else{
       //dd($usersData);

       $usersData = $user->getUserFilter($UserDataFilter,$UserDataFilter['totalPages'],$UserDataFilter['orderBy']);
       }
       return view('users.index',['users' => $usersData , 'usersDataForm' => $UserDataFilter]);


    }
}
