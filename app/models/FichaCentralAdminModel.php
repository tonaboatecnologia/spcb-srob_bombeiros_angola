<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class FichaCentralAdminModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $variable;
    private $transaction;
    private array $params;

    #ficha Central

    public function SolicitanteFc(array $fichaCentralFormDatas)
    {

        // global $fichaCentralFormDatas, $fichaCentralFormDatas;
        if (!empty((isset($fichaCentralFormDatas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados


                $this->table = "solicitantes";
                $this->fields = "id_solicitante, nome,	nif, telefone,	email,	relato,	bairro,	cidade,	rua, referencia";
                $this->values = "?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    $fichaCentralFormDatas['nomeSolicitante'],
                    $fichaCentralFormDatas['nifSolicitante'],
                    ucwords($fichaCentralFormDatas['telSolicitante']),
                    $fichaCentralFormDatas['emailSolicitante'],
                    strtolower($fichaCentralFormDatas['relatoSolicitante']),
                    $fichaCentralFormDatas['bairroSolicitante'],
                    $fichaCentralFormDatas['provSolicitante'],
                    ucwords(strtolower($fichaCentralFormDatas['enderecoSolicitante'])),
                    ucwords(strtolower($fichaCentralFormDatas['prSolicitante'])),

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
      //total Solicitante
      public function SolicitanteTotal()
      {
          // Iniciar transação
          $this->transaction = $this->connectionDB();
          $this->transaction->beginTransaction();
          try {
              //$this->variable=$id;
              $this->table = "solicitantes";
              $this->fields = "count(*) as solicitante_Total";
              $SolicitanteTotal = $this->selectDB($this->fields, $this->table, $this->condition);
              // Commit da transação
              $this->transaction->commit();
  
              return $SolicitanteTotal->fetch(\PDO::FETCH_ASSOC);
          } catch (\Exception $e) {
              // Rollback da transação em caso de erro
              $this->transaction->rollback();
  
              // Adicione tratamento de erro aqui, se necessário
              return false;
          }
      }

    public function tipOcorrencia(array $fichaCentralFormDatas)
    {

        // global $fichaCentralFormDatas, $fichaCentralFormDatas;
        if (!empty((isset($fichaCentralFormDatas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados
                global $tipos;
                foreach ($fichaCentralFormDatas['tipOcorrencia'] as $ocorrencias) :
                    $tipos = $tipos . $ocorrencias . " , ";
                endforeach;

                $this->table = "tipo_ocorrencias";
                $this->fields = "id_tipo_ocorrencias,	nome,	Id_ClinicoTD,	Id_Acidente,	Id_obtrectico,	Id_Incendio";
                $this->values = "?, ?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    $tipos,
                    // $fichaCentralFormDatas['tipoOcorrencia'],
                    $fichaCentralFormDatas['clinicoId'],
                    $fichaCentralFormDatas['acidenteId'],
                    $fichaCentralFormDatas['obstetricoId'],
                    $fichaCentralFormDatas['incendioId'],


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
    public function lastTipOcorrenciaId(){
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
           //$this->variable=$id;lastSolicitanteId

            $this->table = "tipo_ocorrencias";
            $this->fields = "id_tipo_ocorrencias";
            $this->condition = "order by id_tipo_ocorrencias desc Limit 1";
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
               $this->fields = "id_tipOcorrencia=:id_tipOcorrencia";
               $this->condition = "id_solicitante=:lastId_solicitante";
               $this->params =
                   [
                       ":lastId_solicitante" => $lastIds['lastSolicitanteTipo'],
                       ":id_tipOcorrencia" => $lastIds['lastTipOcorrenciaId'],
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
    //acidente
    public function acidentesFc(array $fichaCentralFormDatas)
    {

        // global $fichaCentralFormDatas, $fichaCentralFormDatas;
        if (!empty((isset($fichaCentralFormDatas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados


                global $veiculo;
                foreach ($fichaCentralFormDatas['atTipoVeiculo'] as $tipoVeiculo) :
                    $veiculo = $veiculo . $tipoVeiculo . " , ";
                endforeach;

                $this->table = "ocorrencias_acidentes_transito";
                $this->fields = "id_acidente,	veiculos_envolvidos,	quantos_envolvidos,	numero_vitimas,	preso_algo,	produtos_perigos";
                $this->values = "?,?,?,?,?,?";
                $this->params = [
                    NULL,
                    $veiculo,
                    //ucwords($fichaCentralFormDatas['atTipoVeiculo']),
                    $fichaCentralFormDatas['atQuantVeiculos'],
                    ucwords($fichaCentralFormDatas['atiquantvitimas']),
                    $fichaCentralFormDatas['atPresoFerragem'],
                    strtolower($fichaCentralFormDatas['atProdPerigos']),
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
    public function acidentesId()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_acidentes_transito";
            $this->fields = "id_acidente";
            $this->condition = "order by id_acidente desc LIMIT 1";
            $this->params = [$this->variable];
            $incendioId = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $incendioId->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
           //seleciona as viaturas das equipes
           public function lastSolicitanteId(){
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();
            try {
               //$this->variable=$id;
    
                $this->table = "solicitantes";
                $this->fields = "id_solicitante";
                $this->condition = "order by id_solicitante desc Limit 1";
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

    //total acidentes
    public function acidenteTotal()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_acidentes_transito";
            $this->fields = "count(*) as total_acidentes";
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
    //incendio
    public function incendioFc(array $fichaCentralFormDatas)
    {

        // global $fichaCentralFormDatas, $fichaCentralFormDatas;
        if (!empty((isset($fichaCentralFormDatas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados

                global $objecto;
                foreach ($fichaCentralFormDatas['iobjQueimando'] as $queimando) :
                    $objecto = $objecto . $queimando . " , ";
                endforeach;

                $this->table = "ocorrencias_incendio";
                $this->fields = "id_incendio, objeto_queimando, quant_objecto, ha_edificacoes_proximas, numero_vitimas";
                $this->values = "?,?,?,?,?";
                $this->params = [
                    NULL,
                    $objecto,
                    // ucwords($fichaCentralFormDatas['iobjQueimando']),
                    ucwords($fichaCentralFormDatas['iquantObj']),
                    ucwords($fichaCentralFormDatas['iEdificios']),
                    $fichaCentralFormDatas['iquantVitimas'],

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
    public function incendioId()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_incendio";
            $this->fields = "id_incendio";
            $this->condition = "order by id_incendio desc LIMIT 1";
            $this->params = [$this->variable];
            $incendioId = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $incendioId->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }

    public function incendioTotal()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_incendio";
            $this->fields = "count(*) as total_incendio";
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
    //obstetrico
    public function obstetricoFc(array $fichaCentralFormDatas)
    {

        // global $fichaCentralFormDatas, $fichaCentralFormDatas;
        if (!empty((isset($fichaCentralFormDatas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados

                $this->table = "ocorrencias_obstetrico";
                $this->fields = "id_obstetrico,idade_gestante,tempo_gestacao,primeira_gravidez,ha_contracoes,perda_sangue";
                $this->values = "?,?,?,?,?,?";
                $this->params = [
                    NULL,
                    ucwords($fichaCentralFormDatas['obIdadeGestante']),
                    ucwords($fichaCentralFormDatas['obTempGest']),
                    $fichaCentralFormDatas['obPrimeiraGravidez'],
                    $fichaCentralFormDatas['obContracao'],
                    $fichaCentralFormDatas['obSangramento'],
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
    public function obstetricoId()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_obstetrico";
            $this->fields = "id_obstetrico";
            $this->condition = "order by id_obstetrico desc LIMIT 1";
            $this->params = [$this->variable];
            $incendioId = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $incendioId->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
    //total obstetrico
    public function obstetricoTotal()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_obstetrico";
            $this->fields = "count(*) as total_obstetrico";
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
    //clinico
    public function clinicoFc(array $fichaCentralFormDatas)
    {

        // global $fichaCentralFormDatas, $fichaCentralFormDatas;
        if (!empty((isset($fichaCentralFormDatas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados
                global $ocorrencia;
                foreach ($fichaCentralFormDatas['localOcorrencia'] as $local) :
                    $ocorrencia = $ocorrencia . $local . ',';
                endforeach;
                $this->table = "ocorrencias_clinico_traumas_diversos";
                $this->fields = "id_clinico,nome,idade,local_ocorrencia,motivo_ativacao,acordada,respirando,sangramento,fraturas_visiveis";
                $this->values = "?,?,?,?,?,?,?,?,?";
                $this->params = [
                    NULL,
                    ucwords($fichaCentralFormDatas['nomePaciente']),
                    ucwords($fichaCentralFormDatas['idadePaciente']),
                    $ocorrencia,
                    // ucwords($fichaCentralFormDatas['localOcorrencia']),
                    $fichaCentralFormDatas['motivoAtivacao'],
                    $fichaCentralFormDatas['acordado'],
                    $fichaCentralFormDatas['respirando'],
                    $fichaCentralFormDatas['sangrando'],
                    $fichaCentralFormDatas['fraturasVisiveis'],

                ];
                // endforeach;
                // endforeach;
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
    public function clinicoId()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_clinico_traumas_diversos";
            $this->fields = "id_clinico";
            $this->condition = "order by id_clinico desc LIMIT 1";
            $this->params = [$this->variable];
            $incendioId = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $incendioId->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
    //total clínico
    public function clinicoTotal()
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            //$this->variable=$id;
            $this->table = "ocorrencias_clinico_traumas_diversos";
            $this->fields = "count(*) as total_clinico";
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
    //verificate if exist at email & nif
    public function getValidateNifEmail($email, $nip)
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();

        try {
            // Lógica de inserção no banco de dados

            $this->table = "solicitantes";
            $this->fields = "*";
            $this->condition = "where email = ? OR nif = ?";
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
}
