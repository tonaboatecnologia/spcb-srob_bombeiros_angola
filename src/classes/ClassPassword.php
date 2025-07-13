<?php

namespace Src\Classes;

use App\Models\LoginAdminModel;


class ClassPassword
{
    private $user;
    public function __construct()
    {
       $this->user = new LoginAdminModel();
    }

    #criar o hash da senha para Salvar  no banco de Dados
    public function passwordHash($senha)
    {
        return password_hash($senha, PASSWORD_BCRYPT);
    }

    #verifica se o hash da senha está correta
    public function verifyHash($emailNip, $senha)
    {
        $hashPassword = $this->user->getUserDatas($emailNip)['userDatas']['senha'] ?? false;
     if(!empty(isset($hashPassword))){
         if(password_verify($senha, $hashPassword)){
            return true;
         }else{
            return false;
         }
        }
    }
}
