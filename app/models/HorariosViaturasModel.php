<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class HorariosViaturasModel extends ClassCrud implements InterfaceCrud
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
    public function horarios(array $horarios)
    {

        // global $horarios, ;
        if (!empty((isset($horarios)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados

                $this->table = "horarios_deslocamento";
                $this->fields = "id_horario_deslocamento,partidaInicio,	chegadaDestino,	saidaDestino,fimOcorrencia,	longitude,	latitude,	id_equipe,	observacoes";
                $this->values = "?, ?, ?, ?, ?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    $horarios['PartidaInicio'],
                    $horarios['chegadaDestino'],
                    $horarios['saidaDestino'],
                    $horarios['FimOcorrencia'],
                    $horarios['chvLongitude'],
                    $horarios['chvLatitude'],
                    $horarios['chvGuarnicao'],  
                    ucwords(strtolower($horarios['chvObsVitima'])),
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
    //
    public function getAllHorariosDatas(string $searchHorarios, int $Limit, string $Order)
    {
        $searchCondition = "";
        $params = [];

        // Verificar se há um critério de pesquisa
        if (!empty($searchHorarios)) {
            $searchCondition = "WHERE email LIKE ? OR nome LIKE ? OR idade LIKE ? OR nip LIKE ? OR cargo LIKE ? OR patente LIKE ? Order by $Order Limit $Limit";
            $params = [
               '%' . $searchHorarios . '%',
               '%' . $searchHorarios . '%',
                '%' . $searchHorarios . '%',
               '%' . $searchHorarios . '%',
                '%' . $searchHorarios . '%',
                '%' . $searchHorarios . '%',
            ];
        }

        // Executar a consulta com parâmetros
        $getAllUserDatas = $this->selectDB("*", "usuarios", $searchCondition, $params);

        // Retornar os resultados
        return $getAllUserDatas->fetchAll(\PDO::FETCH_ASSOC);
    }
//string $inicio, string $saida, string $chegada, string $fim, string $searchHorarios, string $Order, int $Limit
    public function getSearchHorarios(string $inicio, string $saida, string $chegada, string $fim, string $searchHorarios, string $Order, int $Limit)
    {
        //verifica se existe dados no critéri;
  

        $this->fields = "h.partidaInicio, h.saidaDestino, h.chegadaDestino, h.fimOcorrencia, h.observacoes, e.nome_equipe, e.nome_bombeiro, e.matricula_viatura";
        $this->table = "horarios_deslocamento as h";
        $this->joins ="INNER JOIN equipes as e on h.id_horario_deslocamento = e.id_equipe";
        $this->variables="";
        $this->condition = "Where h.data_criacao BETWEEN ? and ? and ? and ? OR nome_equipe LIKE ? OR nome_bombeiro LIKE ? OR matricula_viatura LIKE ? order by $Order Desc limit $Limit";
        $this->params =[
            $inicio,//'2024-05-08 10:15:00',
            $saida,//'2024-06-01 22:46:00',
            $chegada,//'2024-05-24 01:46:00',
            $fim,//'2024-05-12 10:15:00',
            '%' . $searchHorarios . '%', //'%Equipe-guarni&ccedil;&atilde%',
            '%' . $searchHorarios . '%', //'%Cardoso%',
            '%' . $searchHorarios . '%', //'%Veiculos-alfa/16-05-2024-09:16:32708%',
            
                
        
        ];
        $getSearchHorarios = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition, $this->params);
        return $getSearchHorarios->fetchAll(\PDO::FETCH_ASSOC);
    }

    //seleção de pesquisa
    public function getAllOrderHorarios(string $Order, int $Limit)
    {
        $this->fields = "h.partidaInicio, h.saidaDestino, h.chegadaDestino, h.fimOcorrencia, h.observacoes, e.nome_equipe, e.nome_bombeiro, e.matricula_viatura";
        $this->table = "horarios_deslocamento as h";
        $this->joins ="INNER JOIN equipes as e on h.id_horario_deslocamento = e.id_equipe";
        $this->condition = "$Order by h.data_criacao Desc $Limit";
        $this->params =[];
        $this->variables="";
        $getAllHorarios = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition);
        return $getAllHorarios->fetchAll(\PDO::FETCH_ASSOC);
    }
    //seleçã relacional horarios e equipes
    public function getAllHorarios()
    {
        $this->fields = "h.id_horario_deslocamento, h.partidaInicio, h.saidaDestino, h.chegadaDestino, h.fimOcorrencia, h.observacoes, e.nome_equipe, e.nome_bombeiro, e.matricula_viatura";
        $this->table = "horarios_deslocamento as h";
        $this->joins ="INNER JOIN equipes as e on h.id_horario_deslocamento = e.id_equipe";
        $this->condition = "ORDER by h.data_criacao Desc Limit 10";
        $this->params =[];
        $this->variables="";
        $getAllHorarios = $this->joinSelect($this->fields, $this->table, $this->joins, $this->condition);
        return $getAllHorarios->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getHorariosDeleter(int $id)
    {
        if (!empty(isset($id))) :
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();
            try {
                $this->table = "horarios_deslocamento";
                $this->condition = "id_horario_deslocamento = :id";
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

    //---------------------------
/*
// Exemplo de seleção usando join
SELECT h.partidaInicio, h.saidaDestino, h.chegadaDestino, h.fimOcorrencia, h.observacoes, e.nome_equipe, e.nome_bombeiro, e.matricula_viatura from horarios_deslocamento as h INNER JOIN equipes as e on h.id_horario_deslocamento = e.id_equipe ORDER by h.data_criacao limit 2;

$fields = "u.name, u.email, p.title";
$tables = "users u";
$joins = "LEFT JOIN posts p ON u.id = p.user_id";
$condition = "WHERE u.id = :id";
$params = [":id" => 1];
$selectResult = $classCrud->joinSelect($fields, $tables, $joins, $condition, $params);

if ($selectResult) {
    while ($row = $selectResult->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome do Usuário: " . $row['name'] . "<br>";
        echo "E-mail do Usuário: " . $row['email'] . "<br>";
        echo "Título do Post: " . $row['title'] . "<br>";
        echo "<br>";
    }
} else {
    echo "Erro ao selecionar dados.";
}


//-------------------------
// Exemplo de seleção usando join com quatro tabelas
$fields = "u.name, u.email, p.title, c.category_name, t.tag_name";
$tables = "users u";
$joins = "LEFT JOIN posts p ON u.id = p.user_id
          LEFT JOIN categories c ON p.category_id = c.category_id
          LEFT JOIN post_tags pt ON p.post_id = pt.post_id
          LEFT JOIN tags t ON pt.tag_id = t.tag_id";
$condition = "WHERE u.id = :id";
$params = [":id" => 1];
$selectResult = $classCrud->joinSelect($fields, $tables, $joins, $condition, $params);

if ($selectResult) {
    while ($row = $selectResult->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome do Usuário: " . $row['name'] . "<br>";
        echo "E-mail do Usuário: " . $row['email'] . "<br>";
        echo "Título do Post: " . $row['title'] . "<br>";
        echo "Categoria do Post: " . $row['category_name'] . "<br>";
        echo "Tag do Post: " . $row['tag_name'] . "<br>";
        echo "<br>";
    }
} else {
    echo "Erro ao selecionar dados.";
}
*/


}
