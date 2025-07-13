<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class UsuariosAdminModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $transaction;
    private array $params;

    #create users
    public function createUsers(array $userFormDatas,  array $userFormDatas2, array $userFormDatas3)
    {

        // global $userFormDatas, $userFormDatas2;
        if (!empty((isset($userFormDatas, $userFormDatas2, $userFormDatas3)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados

                $this->table = "usuarios";
                $this->fields = "id_bombeiro,	foto,	path,	nome,	nip,	email,	idade,	senha,	patente, cargo,	permissao,	status";
                $this->values = "?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    $userFormDatas3['userCustomFileName'],
                    $userFormDatas3['pathPreview'],
                    ucwords($userFormDatas['userName']),
                    $userFormDatas['userNip'],
                    strtolower($userFormDatas['userEmail']), 
                    $userFormDatas['userDataNasc'],
                    $userFormDatas2['hashSenha'],
                    ucwords(strtolower($userFormDatas['userPatente'])),
                    ucwords(strtolower($userFormDatas['userCargo'])),
                    $userFormDatas['userPermissao'],
                    $userFormDatas['userStatus'],
                ];
                $this->insertDB($this->table, $this->fields, $this->values, $this->params);

                $this->table = "confirmations";
                $this->fields = "Id, Email, Token";
                $this->values = ":Id, :Email, :Token";
                $this->params = [
                    ":Id" => 0,
                    ":Email" => $userFormDatas['userEmail'],
                    ":Token" => $userFormDatas2['userToken'],
                ];
                $this->insertDB($this->table, $this->fields, $this->values, $this->params);
                // Commit da transação
                $this->transaction->commit();

                return true;
            } catch (\Exception $e) {
                // Rollback da transação em caso de erro
                $this->transaction->rollback();

                // Adicione tratamento de erro aqui, se necessário
                return false;
            }
        }
    }


    #verificar o email directamente com o banco de dados 
    public function getEmail(string $email)
    {
        $this->table = "usuarios";
        $this->fields = "*";
        $this->condition = "where Email = :Email";
        $this->params = [":Email" => $email];
        $getEmail = $this->selectDB($this->fields, $this->table, $this->condition, $this->params);
        return $getEmail->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getIssetEmail($emailNip)
    {
        $this->table = "usuarios";
        $this->fields = "*";
        $this->condition = "where email = ? OR nip = ?";
        $this->params = [$emailNip, $emailNip];
        $queryEmail = $this->selectDB($this->fields, $this->table, $this->condition, $this->params);
        return $queryEmail->rowCount();
    }

    public function getValidateNifEmail($email, $nip)
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();

        try {
            // Lógica de inserção no banco de dados

            $this->table = "usuarios";
            $this->fields = "*";
            $this->condition = "where email = ? OR nip = ?";
            $this->params = [$email, $nip];
            $getValidateNifEmail = $this->selectDB($this->fields, $this->table, $this->condition, $this->params);
            return $getValidateNifEmail->rowCount();
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }


    /*public function getAllUserDatas(string $userDataSearch, int $Limit, string $Order)
    {

        $nip = '%' . $userDataSearch . '%';
        $bi = '%' . $userDataSearch . '%';
        $email = '%' . $userDataSearch . '%';
        $nome = '%' . $userDataSearch . '%';
        $dataNasc = '%' . $userDataSearch . '%';
        $contacto = '%' . $userDataSearch . '%';
        $numerOrdem = '%' . $userDataSearch . '%';
        $numeroPasse = '%' . $userDataSearch . '%';
        $this->table = "usuarios";
        $this->fields = "*";
        $this->condition = "where Email like :Email or Nome like :Nome or DataNasc like :DataNasc or Contacto like :Contacto or NumerOrdem like :NumerOrdem or NumeroPasse like :NumeroPasse or Nip like :Nip or Bi like :Bi Order by $Order Limit $Limit";
        $getAllUserDatas = $this->selectDB($this->fields, $this->table, $this->condition, [":Nip" => $nip, ":Bi" => $bi, ":Email" => $email, ":Nome" => $nome, ":DataNasc" => $dataNasc, ":Contacto" => $contacto, ":NumerOrdem" => $numerOrdem, ":NumeroPasse" => $numeroPasse]);
    $i = 0;
    $userDatas = $getAllUserDatas->fetchAll(\PDO::FETCH_ASSOC);
      /*  while($userDatas){
      global $allUsers;
            $allUsers[$i] = [ 
                'Nip' => $userDatas['Nip'],
                'Bi' => $userDatas['Bi'],
                'Email' => $userDatas['Email'],
                'Nome' => $userDatas['Nome'],
                'DataNasc' => $userDatas['DataNasc'],
                'Contacto' => $userDatas['Contacto'],
                'NumerOrdem' => $userDatas['NumerOrdem'],
                'NumeroPasse' => $userDatas['NumeroPasse']
            ];

            $i++;
        }
       // return 
      // $users = $getAllUserDatas->fetchAll(\PDO::FETCH_ASSOC);
       return $userDatas;

    }*/
    public function getAllUserDatas(string $userDataSearch, int $limitInicio, int $limitResult, string $Order)
    {
        $searchCondition = "";
        $params = [];

        // Verificar se há um critério de pesquisa
        if (!empty($userDataSearch)) {
            $searchCondition = "WHERE email LIKE ? OR nome LIKE ? OR idade LIKE ? OR nip LIKE ? OR cargo LIKE ? OR patente LIKE ? Order by $Order Limit $limitInicio, $limitResult";
            $params = [
               '%' . $userDataSearch . '%',
               '%' . $userDataSearch . '%',
                '%' . $userDataSearch . '%',
               '%' . $userDataSearch . '%',
                '%' . $userDataSearch . '%',
                '%' . $userDataSearch . '%',
            ];
        }

        // Executar a consulta com parâmetros
        $getAllUserDatas = $this->selectDB("*", "usuarios", $searchCondition, $params);

        // Retornar os resultados
        return $getAllUserDatas->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getFindUsers($id)
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            $this->table = "usuarios";
            $this->fields = "*";
            $this->condition = "where id_bombeiro = :id";
            $this->params = [":id" => $id];
            $getFindUsers = $this->selectDB($this->fields, $this->table, $this->condition, $this->params);

            // Commit da transação
            $this->transaction->commit();

            return $getFindUsers->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
    //seleciona os integrantes das equipes
    public function integrantes()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "usuarios";
            $this->fields = "id_bombeiro, nome";
            $this->condition = "order by id_bombeiro desc";
            //$this->params = [$this->variable];
            $integrantes = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $integrantes->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
    public function getListUsers(string $Order, int $inicio, int $Limit)
    {
        $this->table = "usuarios";
        $this->fields = "*";
        $this->condition = "Order by $Order Limit $inicio,  $Limit";
        $getListUsers = $this->selectDB($this->fields, $this->table, $this->condition);
        return $getListUsers->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllUsers()
    {
        $this->table = "usuarios";
        $this->fields = "*";
        $this->condition = "Order by id_bombeiro desc";
        $getListUsers = $this->selectDB($this->fields, $this->table, $this->condition);
        return $getListUsers->fetchAll(\PDO::FETCH_ASSOC);
    }
    //total usuarios
    public function usuariosTotal()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "usuarios";
            $this->fields = "count(*) as total_usuarios";
            $incendioId = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $incendioId->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
    public function getDeleteUsers(int $id)
    {
        $this->table = "usuarios";
        $this->condition = "id_bombeiro = :Id";
        $this->params = [":Id" => $id];
        $getDeleteUsers = $this->deleteDB($this->table, $this->condition, $this->params);
        return $getDeleteUsers->rowCount();
    }
    public function getTruncateUsers($table)
    {
        $this->table = $table;
        $this->truncateTableDB($this->table);
        return true;
    }
    //edição dos dados usuários
    public function getUpdateUsers(array $userFormDatas, array $userFormDatas2)
    {
        // Lógica de inserção no banco de dados
        if (!empty((isset($userFormDatas, $userFormDatas2)))) :
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                //foto=:foto, path=:path,
                $this->table = "usuarios";
                $this->fields = "nome=:nome, nip=:nip,	email=:email,	idade=:idade,	senha=:senha,	patente=:patente, cargo=:cargo,	permissao=:permissao,status=:status, data_modified=NOW()";
                $this->condition = "id_bombeiro =:idbombeiro";
                $this->params =
                    [
                        ":idbombeiro" => $userFormDatas2['userId'],
                        /*":foto" => $userFormDatas2['userCustomFileName'],
                        ":path" => $userFormDatas2['pathPreview'],*/
                        ":nome" => ucwords($userFormDatas['userName']),
                        ":nip" => $userFormDatas['userNip'],
                        ":email" => strtolower($userFormDatas['userEmail']),
                        ":idade" => $userFormDatas['userDataNasc'],
                        ":senha" => $userFormDatas2['hashSenha'],
                        ":patente" => ucwords(strtolower($userFormDatas['userPatente'])),
                        ":cargo" => ucwords(strtolower($userFormDatas['userCargo'])),
                        ":permissao" => $userFormDatas['userPermissao'],
                        ":status" => $userFormDatas['userStatus'],

                    ];

                $getUpdateUsers = $this->updateDB($this->table, $this->fields, $this->condition, $this->params);
                // Commit da transação
                $this->transaction->commit();

                return $getUpdateUsers->rowCount();
            } catch (\Exception $e) {
                // Rollback da transação em caso de erro
                $this->transaction->rollback();

                // Adicione tratamento de erro aqui, se necessário
                return false;
            }
        endif;
    }
    //edição de imagem 
    public function getUpdateImg(array $userFormDatas2)
    {
        // Lógica de edição no banco de dados
        if (!empty((isset($userFormDatas2)))) :
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                $this->table = "usuarios";
                $this->fields = "foto=:foto, path=:path, data_modified=NOW()";
                $this->condition = "id_bombeiro =:idbombeiro";
                $this->params =
                    [
                        ":idbombeiro" => $userFormDatas2['userId'],
                        ":foto" => $userFormDatas2['userCustomFileName'],
                        ":path" => $userFormDatas2['pathPreview'],
                       
                    ];

                $getUpdateImg = $this->updateDB($this->table, $this->fields, $this->condition, $this->params);
                // Commit da transação
                $this->transaction->commit();

                return $getUpdateImg->rowCount();
            } catch (\Exception $e) {
                // Rollback da transação em caso de erro
                $this->transaction->rollback();

                // Adicione tratamento de erro aqui, se necessário
                return false;
            }
        endif;
    }

    //last id
       //seleciona as viaturas das equipes
       public function lastUserId(){
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
           //$this->variable=$id;

            $this->table = "usuarios";
            $this->fields = "id_bombeiro";
            $this->condition = "order by id_bombeiro desc Limit 10";
            //$this->params = [$this->variable];
            $veiculos = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $veiculos->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
   }
}
