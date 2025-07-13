<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class OcorrenciasAdminModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $joins;
    private $variables;

    private $transaction;
    private array $params;

    #create users
    public function ocorrencias(array $ocorrencias)
    {

        // global $ocorrencias, ;
        if (!empty((isset($ocorrencias,)))) {

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
                    ['userCustomFileName'],
                    ['pathPreview'],
                    ucwords($ocorrencias['userName']),
                    $ocorrencias['userNip'],
                    strtolower($ocorrencias['userEmail']),
                    $ocorrencias['userDataNasc'],
                    ['hashSenha'],
                    ucwords(strtolower($ocorrencias['userPatente'])),
                    ucwords(strtolower($ocorrencias['userCargo'])),
                    $ocorrencias['userPermissao'],
                    $ocorrencias['userStatus'],
                ];
                $this->insertDB($this->table, $this->fields, $this->values, $this->params);

                $this->table = "confirmations";
                $this->fields = "Id, Email, Token";
                $this->values = ":Id, :Email, :Token";
                $this->params = [
                    ":Id" => 0,
                    ":Email" => $ocorrencias['userEmail'],
                    ":Token" => ['userToken'],
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

    //seleção de pesquisa
    //string $inicio, string $saida, string $chegada, string $fim, string $searchOcorrences, string $Order, int $Limit
   /* public function getSearchOcorrences(string $searchOcorrences, $inicio, string $fim, string $order, int $limit)
    {


        $this->params = [];
        $inicio = "";
        
        $searchOcorrences = "";
        $fim = "";
        //or dtoc.gravidade_ocorrencia like ? or dtoc.status_ocorrencia like ? or s.nome like ? or s.cidade like ? or s.bairro like ? or s.rua like ? or s.referencia like ? or tpoc.nome like ? or org.nome like ? or e.nome_equipe like ?   
        $this->fields = "s.id_solicitante as id_solicitante,  s.nome as solicitantes, s.cidade as municipio, s.bairro, s.rua, s.referencia, tpoc.nome as tipo_ocorrencias,  org.nome as orgaos_apoio, hv.nome_equipe as equipes, s.data_creation as data_Ocorrencia";
        $this->table = "solicitantes as s";
        $this->joins = "INNER JOIN tipo_ocorrencias as tpoc on tpoc.id_tipo_ocorrencias = s.id_tipOcorrencia 
        INNER JOIN orgaos_apoio as org on org.id_orgao = s.id_orgaoApoio  
        INNER join equipes as hv on hv.id_equipe = s.id_equipe";
        $this->variables = "";
        if (!empty($inicio) && !empty($fim)  && !empty($searchOcorrences)) {
            $this->condition = "where s.data_creation BETWEEN ? and ? or s.cidade LIKE ? or s.rua LIKE ? or s.referencia LIKE ? or hv.nome_equipe LIKE ? order by  $order desc LIMIT $limit";
            $this->params = [
                $inicio, //'2024-05-08 10:15:00',
                $fim, //'2026-05-26 08:13:09',
                
                '%' . $searchOcorrences . '%', //'%Equipe-guarni&ccedil;&atilde%',
                '%' . $searchOcorrences . '%', //'%Cardoso%',
                '%' . $searchOcorrences . '%', //'%Veiculos-alfa/16-05-2024-09:16:32708%',
                '%' . $searchOcorrences . '%', //'%Veiculos-alfa/16-05-2024-09:16:32708%',
              

            ];
        }
        $getSearchOcorrences = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition, $this->params);
        return $getSearchOcorrences->fetchAll(\PDO::FETCH_ASSOC);
    }*/
    public function getSearchOcorrences(string $searchOcorrences, $inicio, string $fim, string $order, int $limit)
    {


        $this->params = [];
        $inicio = "";
        
        $searchOcorrences = "";
        $fim = "";
        //or dtoc.gravidade_ocorrencia like ? or dtoc.status_ocorrencia like ? or s.nome like ? or s.cidade like ? or s.bairro like ? or s.rua like ? or s.referencia like ? or tpoc.nome like ? or org.nome like ? or e.nome_equipe like ?   
        $this->fields = "s.id_solicitante as id_solicitante,  s.nome as solicitantes, s.cidade as municipio, s.bairro, s.rua, s.referencia, tpoc.nome as tipo_ocorrencias,  org.nome as orgaos_apoio, hv.nome_equipe as equipes, s.data_creation as data_Ocorrencia";
        $this->table = "solicitantes as s";
        $this->joins = "INNER JOIN tipo_ocorrencias as tpoc on tpoc.id_tipo_ocorrencias = s.id_tipOcorrencia 
        INNER JOIN orgaos_apoio as org on org.id_orgao = s.id_orgaoApoio  
        INNER join equipes as hv on hv.id_equipe = s.id_equipe";
        $this->variables = "";
        if (!empty($inicio) && !empty($fim)  && !empty($searchOcorrences)) {
            $this->condition = "where s.data_creation BETWEEN ? and ? or s.cidade LIKE ? or s.rua LIKE ? or s.referencia LIKE ? or hv.nome_equipe LIKE ? order by  $order desc LIMIT $limit";
            $this->params = [
                $inicio, //'2024-05-08 10:15:00',
                $fim, //'2026-05-26 08:13:09',
                
                '%' . $searchOcorrences . '%', //'%Equipe-guarni&ccedil;&atilde%',
                '%' . $searchOcorrences . '%', //'%Cardoso%',
                '%' . $searchOcorrences . '%', //'%Veiculos-alfa/16-05-2024-09:16:32708%',
                '%' . $searchOcorrences . '%', //'%Veiculos-alfa/16-05-2024-09:16:32708%',
              

            ];
        }
        $getSearchOcorrences = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition, $this->params);
        return $getSearchOcorrences->fetchAll(\PDO::FETCH_ASSOC);
    }

    //seleção por ordem e limite
    public function getOcorrenciasOrderLimit(string $Order, int $Limit)


    {
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {

            $this->params = [];

            $this->fields = "s.id_solicitante as id_solicitante,  s.nome as solicitantes, s.cidade as municipio, s.bairro, s.rua, s.referencia, tpoc.nome as tipo_ocorrencias,  org.nome as orgaos_apoio, hv.nome_equipe as equipes, s.data_creation as data_Ocorrencia";
            $this->table = "solicitantes as s";
            $this->joins = "INNER JOIN tipo_ocorrencias as tpoc on tpoc.id_tipo_ocorrencias = s.id_tipOcorrencia 
         INNER JOIN orgaos_apoio as org on org.id_orgao = s.id_orgaoApoio  
         INNER join equipes as hv on hv.id_equipe = s.id_equipe";

            if (!empty($order) && !empty($Limit)) :
                $this->condition = "order by $Order desc limit $Limit";

            endif;

            $this->variables = "";
            $getOcorrenciasOrderLimit = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition);
            $this->transaction->commit();
            return $getOcorrenciasOrderLimit->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }

    //seleção de listagem
    /* public function getAllOcorrences()
    {
        $this->fields = "dtoc.id_ocorrencia as id_ocorrencia, dtoc.gravidade_ocorrencia, dtoc.status_ocorrencia as status_ocorrencia, s.nome as solicitante, s.cidade as municipio, s.bairro, tpoc.nome as tipo_ocorrencias,  org.nome as orgaos_apoio, dtoc.data_creation, dtoc.data_modified";
        $this->table = "detalhes_ocorrencia as dtoc";
        $this->joins ="LEFT join solicitantes as s on dtoc.id_ocorrencia = s.id_solicitante INNER JOIN tipo_ocorrencias as tpoc on dtoc.id_ocorrencia = tpoc.id_tipo_ocorrencias LEFT JOIN orgaos_apoio as org on dtoc.id_ocorrencia = org.id_orgao INNER join horarios_deslocamento as hv on dtoc.id_ocorrencia = hv.id_horario_deslocamento";
        $this->condition = "order by dtoc.id_ocorrencia desc limit 10";
        $this->params =[];
        $this->variables="";
        $getAllOcorrences = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition);
        return $getAllOcorrences->fetchAll(\PDO::FETCH_ASSOC);
    }*/
    public function getAllOcorrences()

    {

        $this->fields = "s.id_solicitante as id_solicitante,  s.nome as solicitantes, s.cidade as municipio, s.bairro, s.rua, s.referencia, tpoc.nome as tipo_ocorrencias,  org.nome as orgaos_apoio, hv.nome_equipe as equipes, s.data_creation as data_Ocorrencia";
        $this->table = "solicitantes as s";
        $this->joins = "INNER JOIN tipo_ocorrencias as tpoc on tpoc.id_tipo_ocorrencias = s.id_tipOcorrencia 
        INNER JOIN orgaos_apoio as org on org.id_orgao = s.id_orgaoApoio  
        INNER join equipes as hv on hv.id_equipe = s.id_equipe";
        $this->condition = "order by s.data_creation desc limit 10";
        $this->params = [];
        $this->variables = "";
        $getAllOcorrences = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition);
        return $getAllOcorrences->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getOcorrencesEditer(array $ocorrencias)
    {
        //Lógica de inserção no banco de dados
        if (!empty((isset($ocorrencias)))) :
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {

                $this->table = "detalhes_ocorrencia";
                $this->fields = "gravidade_ocorrencia=:gravidade_ocorrencia,status_ocorrencia=:status_ocorrencia,data_modified=NOW()";
                $this->condition = "id_ocorrencia =:id_ocorrencia";
                $this->params =
                    [
                        ":id_ocorrencia" => $ocorrencias['idUpdateOcorrencias'],
                        ":gravidade_ocorrencia" => $ocorrencias['gravidade'],
                        ":status_ocorrencia" => $ocorrencias['status'],

                    ];

                $getOcorrencesEditer = $this->updateDB($this->table, $this->fields, $this->condition, $this->params);
                // Commit da transação
                $this->transaction->commit();

                return $getOcorrencesEditer->rowCount();
            } catch (\Exception $e) {
                // Rollback da transação em caso de erro
                $this->transaction->rollback();

                // Adicione tratamento de erro aqui, se necessário
                return false;
            }
        endif;
    }

    public function getOcorrencesDeleter(int $id)
    {
        if (!empty(isset($id))) :
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();
            try {
                $this->table = "detalhes_ocorrencia";
                $this->condition = "id_ocorrencia = :id";
                $this->params = [":id" => $id];
                $getOcorrencesDeleter = $this->deleteDB($this->table, $this->condition, $this->params);
                return $getOcorrencesDeleter->rowCount();
                // Commit da transação
                $this->transaction->commit();
            } catch (\Exception $e) {
                // Rollback da transação em caso de erro
                $this->transaction->rollback();

                // Adicione tratamento de erro aqui, se necessário
                return false;
            }
        endif;
    }

    public function getDetailsOcorrencias($id)
    {
        if (!empty(isset($id))) :
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();
            try {
                /* $this->table = "detalhes_ocorrencia";
            $this->fields = "*";
            $this->condition = "where id_ocorrencia = :id";
            $this->params = [":id" => $id];
            $getDetailsOcorrencias = $this->selectDB($this->fields, $this->table, $this->condition, $this->params);
            return $getDetailsOcorrencias->fetchAll(\PDO::FETCH_ASSOC);
            */
                $this->variables = $id;
                $this->fields = "s.id_solicitante as id_solicitante,  s.nome as solicitantes, s.cidade as municipio, s.bairro, s.rua, s.referencia, tpoc.nome as tipo_ocorrencias,  org.nome as orgaos_apoio, hv.nome_equipe as equipes, s.data_creation as data_Ocorrencia";
                $this->table = "solicitantes as s";
                $this->joins = "INNER JOIN tipo_ocorrencias as tpoc on tpoc.id_tipo_ocorrencias = s.id_tipOcorrencia 
            INNER JOIN orgaos_apoio as org on org.id_orgao = s.id_orgaoApoio  
            INNER join equipes as hv on hv.id_equipe = s.id_equipe";
                $this->condition = "where s.id_solicitante = ? order by s.id_solicitante desc limit 1";
                $this->params = [$this->variables];
                $getAllOcorrences = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition, $this->params);
                return $getAllOcorrences->fetchAll(\PDO::FETCH_ASSOC);
                // Commit da transação
                $this->transaction->commit();
            } catch (\Exception $e) {
                // Rollback da transação em caso de erro
                $this->transaction->rollback();

                // Adicione tratamento de erro aqui, se necessário
                return false;
            }
        endif;
    }
}
/*
id_ocorrencia Descendente 1	
gravidade_ocorrencia	
status_ocorrencia	
nome	
cidade	
bairro	
rua	
referencia	
tipo_ocorrencia	
orgao_Apoio	
observacoes	
id_equipe*/