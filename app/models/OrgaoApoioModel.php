<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class OrgaoApoioModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $transaction;
    private array $params;

    #create users
    public function orgaoApoio(array $orgaoApoio)
    {

        // global $orgaoApoio, ;
        if (!empty((isset($orgaoApoio)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados
                
                global $orgao ;
                foreach ($orgaoApoio['tipOrgao'] as $apoio) :
                    $orgao = $orgao.$apoio." , ";
                endforeach; 
                $this->table = "orgaos_apoio";
                $this->fields = "id_orgao,	nome,	contacto,	atendente,	dataHora";
                $this->values = "?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    //ucwords(strtolower($orgaoApoio['tipOrgao'])),
                    ucwords(strtolower($orgao)),
                    ucwords(strtolower($orgaoApoio['contactoAtendente'])),
                    ucwords(strtolower($orgaoApoio['nomeAtendente'])),
                    $orgaoApoio['dataChamada'],
                    
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


    public function lastOrgaoApoioId(){
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
           //$this->variable=$id;

            $this->table = "orgaos_apoio";
            $this->fields = "id_orgao";
            $this->condition = "order by id_orgao desc Limit 1";
            //$this->params = [$this->variable];
            $veiculos = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $veiculos->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
   }
   public function LastIdSolicitante(array $lastIds)
   {
       // Lógica de inserção no banco de dados
       if (!empty((isset($lastIds)))) :
           // Iniciar transação
           $this->transaction = $this->connectionDB();
           $this->transaction->beginTransaction();

           try {
               //foto=:foto, path=:path,
               $this->table = "solicitantes";
               $this->fields = "id_orgaoApoio=:id_orgaoApoio";
               $this->condition = "id_solicitante=:lastId_solicitante";
               $this->params =
                   [
                       ":lastId_solicitante" => $lastIds['lastSolicitanteOrgao'],
                       ":id_orgaoApoio" => $lastIds['lastIdOrgaoApoio'],
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

}
