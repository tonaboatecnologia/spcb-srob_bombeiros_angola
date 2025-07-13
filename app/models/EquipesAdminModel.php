<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class EquipesAdminModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $transaction;
    private array $params;

    #create users
    public function equipes(array $equipes)
    {

        // global $equipes, ;
        if (!empty((isset($equipes)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados
                //integrantes id
                global $bombeiro ;
                foreach ($equipes['integrantes'] as $integrantes) :
                    $bombeiro = $bombeiro.$integrantes." , ";
                endforeach; 
                //integrantes nome
              
                //viaturas nome
                global $transporte;
                foreach ($equipes['veiculos'] as $veiculos) :
                    $transporte = $transporte.$veiculos." , ";
                endforeach; 
                $this->table = "equipes";
                $this->fields = "id_equipe,nome_equipe,nome_bombeiro,matricula_viatura";
                $this->values = "?, ?, ?, ?";
                $this->params = [
                    NULL,
                    ucwords(strtolower($equipes['nomEquipe'])),
                    ucwords(strtolower($bombeiro)),
                    ucwords(strtolower($transporte)),
                    
                
                ];
                $this->insertDB($this->table, $this->fields, $this->values, $this->params);

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
    public function guarnicao(){
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
           //$this->variable=$id;
            $this->table = "equipes";
            $this->fields = "id_equipe, nome_equipe";
            $this->condition = "order by id_equipe desc";
            //$this->params = [$this->variable];
            $guarnicao = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $guarnicao->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
   }
   public function lastEquipeId(){
    // Iniciar transação
    $this->transaction = $this->connectionDB();
    $this->transaction->beginTransaction();
    try {
       //$this->variable=$id;

        $this->table = "equipes";
        $this->fields = "id_equipe";
        $this->condition = "order by id_equipe desc Limit 1";
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

   //total equipes
   public function equipesTotal()
   {
       // Iniciar transação
       $this->transaction = $this->connectionDB();
       $this->transaction->beginTransaction();
       try {
           //$this->variable=$id;
           $this->table = "equipes";
           $this->fields = "count(*) as total_equipes";
           $equipesTotal = $this->selectDB($this->fields, $this->table, $this->condition);

           // Commit da transação
           $this->transaction->commit();

           return $equipesTotal->fetch(\PDO::FETCH_ASSOC);
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
               $this->fields = "id_equipe=:lastId_equipe";
               $this->condition = "id_solicitante=:lastId_solicitante";
               $this->params =
                   [
                       ":lastId_solicitante" => $lastIds['lastSolicitante'],
                       ":lastId_equipe" => $lastIds['lastEquipeId'],
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
