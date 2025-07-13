<?php

namespace App\Models;

use Src\Interfaces\InterfaceCrud;
use Src\Traits\TraitGetIp;
use \PDO;
class LoginAdminModel extends ClassCrud implements InterfaceCrud
{
    private $traitIpUser;
    private $dateNow;

    public function __construct()
    {
        $this->traitIpUser = TraitGetIp::getUserIp();
       # $this->traitIpUser->getUserIp();
        $this->dateNow = date("Y-m-d H:i:s");
    }

    public function getUserDatas($emailNip)
    {
        $fields = "*";
        $table = "usuarios";
        $condition = "WHERE email = ? OR nip = ? LIMIT 1";
        $userDatas = $this->selectDB($fields, $table, $condition, [$emailNip, $emailNip]);
        
        $users = $userDatas->fetch(\PDO::FETCH_ASSOC);
        $rows = $userDatas->rowCount();
        
        return ["userDatas" => $users, "rows" => $rows];
    }

    public function getUserAllDatas()
    {
        $fields = "*";
        $table = "usuarios";
        $condition = "LIMIT 1";
        $userDatas = $this->selectDB($fields, $table, $condition);
        
        $users = $userDatas->fetch(\PDO::FETCH_ASSOC);
        $rows = $userDatas->rowCount();
        
        return ["userDatas" => $users, "rows" => $rows];
    }

    public function attemptCounter()
    {
        $fields = "*";
        $table = "attempts";
        $condition = "WHERE Ip = :Ip AND Date > :DateLimit";
        $dateLimit = date("Y-m-d H:i:s", strtotime("-20 minutes"));
        $userAttempt = $this->selectDB($fields, $table, $condition, [":Ip" => $this->traitIpUser, ":DateLimit" => $dateLimit]);
        
        return $userAttempt->rowCount();
    }

    public function insertAttemp($errorMsg)
    {
        global $userEmailNipLogin, $userSenhaLogin;
        if(!empty(isset($userEmailNipLogin)) && !empty(isset($userSenhaLogin))):
        if ($this->attemptCounter() < 5) {
            $table = "attempts";
            $fields = "Id, Usuario, Senha, Ip, ErrorMsg";
            $values = ":Id, :Usuario, :Senha, :Ip, :ErrorMsg";
            $this->insertDB($table, $fields, $values, [":Id" => NULL, ":Usuario" => $userEmailNipLogin, ":Senha" => $userSenhaLogin, ":Ip" => $this->traitIpUser, ":ErrorMsg" => $errorMsg]);
        }
    endif;
    }

    public function truncateAttempt(){
        $table = "attempts";
        $this->truncateTableDB($table);
    }
    public function deleteAttempt()
    {
        $table = "attempts";
        $condition = "Ip = :Ip";
        $this->deleteDB($table, $condition, [":Ip" => $this->traitIpUser]);
    }

}
