<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class FichaVitimaAdminModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $transaction;
    private $variables;
    private array $params;

    #vitíma
    public function vitimaId(){
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
           //$this->variable=$id;
            $this->table = "ficha_vitima_dadospessoais";
            $this->fields = "id_dados_basicos";
            $this->condition = "order by id_dados_basicos desc LIMIT 1";
            //$this->params = [$this->variable];
            $vitimaId = $this->selectDB($this->fields, $this->table, $this->condition);

            // Commit da transação
            $this->transaction->commit();

            return $vitimaId->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
   }
    public function Vitima(array $vitima)
    {

        if (!empty((isset($vitima)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados


                $this->table = "ficha_vitima_dadospessoais";
                $this->fields = "id_dados_basicos,	nome, contacto,	idade,	genero,	bi_cedula,	relato,	endereco";
                $this->values = "?, ?, ?, ?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    ucwords(strtolower($vitima['nomePaciente'])),
                    $vitima['contacto'],
                    $vitima['idadePaciente'],
                    ucwords(strtolower($vitima['genero'])),
                    strtoupper($vitima['biPaciente']),
                    ucwords(strtolower($vitima['relato'])),
                    ucwords(strtolower($vitima['endereco'])),


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
    #vitíma
    public function situacaoVitima(array $situacaoVitima)
    {

        if (!empty((isset($situacaoVitima)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados
                //lesao
                global $lesionado ;
                foreach ($situacaoVitima['lesao'] as $lesao) :
                    $lesionado = $lesionado.$lesao." , ";
                endforeach; 
                //fratura
                global $fraturado ;
                foreach ($situacaoVitima['fratura'] as $fratura) :
                    $fraturado = $fraturado.$fratura." , ";
                endforeach; 
                //queimadura
                global $queimado;
                foreach ($situacaoVitima['queimadura'] as $queimadura) :
                    $queimado = $queimado.$queimadura." , ";
                endforeach;  
                //imobilizações
                global $imobilizado ;
                foreach ($situacaoVitima['imobilizacoes'] as $imobilizacoes) :
                    $imobilizado = $imobilizado.$imobilizacoes." , ";
                endforeach;
                //procidimentos;
                global $procedimentado ;
                foreach ($situacaoVitima['procedimentos'] as $procedimentos) :
                    $procedimentado = $procedimentado.$procedimentos." , ";
                endforeach;  

                $this->table = "ficha_vitima_situacao";
                $this->fields = "id_situacao,	local_lesao,	local_fratura,	local_queimadura,	febril,	consciente,	receptorPaciente,	localConduzido,	orientado,	obito,	medida_pupilarEs, medida_pupilarDir,	imobilizacoes_efetuadas,	pressao_arterial,	saturacao_oxigenio,	temperatura,	escala_cipe, abertura_ocular, melhor_resposta_motora, melhor_resposta_verbal,	bpm,	procedimentos_realizados,	quantidade_vitimas,	Escala_Glasgow,	id_dados_basicos";
                $this->values = "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
                $this->params = [
                    NULL,
                    $lesionado,
                    $fraturado,
                    $queimado,
                    ucwords(strtolower($situacaoVitima['estadoFebril'])),
                    ucwords(strtolower($situacaoVitima['estadoConsciente'])),
                    ucwords(strtolower($situacaoVitima['receptorPaciente'])),
                    ucwords(strtolower($situacaoVitima['localTransferencia'])),
                    ucwords(strtolower($situacaoVitima['estadOrientado'])),
                    ucwords(strtolower($situacaoVitima['obito'])),
                    $situacaoVitima['medidaPupilarEsq'],
                    $situacaoVitima['medidaPupilarDir'],
                    $imobilizado,
                    $situacaoVitima['pressArterial'],
                    $situacaoVitima['satOxigenio'],
                    $situacaoVitima['temperatura'],
                    $situacaoVitima['escalaCipe'],
                    $situacaoVitima['aberturaOcular'],
                    $situacaoVitima['mrMotora'],
                    $situacaoVitima['mrVerbal'],
                    $situacaoVitima['bpms'],
                    $procedimentado,
                    $situacaoVitima['quantVitimas'],
                    $situacaoVitima['escalaGlasgow'],
                    $situacaoVitima['vitimaId'],
                   


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
}
