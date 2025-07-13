<?php

namespace App\Models;

use \App\Models\ClassCrud;
use \Src\Interfaces\InterfaceCrud;


class ViaturasModel extends ClassCrud implements InterfaceCrud
{
    private $table;
    private $fields;
    private $values;
    private $condition;
    private $transaction;
    private array $params;

    #create Cars
    public function viaturas(array $viaturas)
    {

        // global $viaturas, ;
        if (!empty((isset($viaturas)))) {

            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();

            try {
                // Lógica de inserção no banco de dados
                $this->table = "viaturas";
                $this->fields = "id_viatura,	marca,	modelo,	cor,	matricula,	ano";
                $this->values = "?, ?, ?, ?, ?, ?";
                $this->params = [
                    NULL,
                    ucwords(strtolower($viaturas['marca'])),
                    ucwords(strtolower($viaturas['modelo'])),
                    ucwords(strtolower($viaturas['cor'])),
                    ucwords(strtolower($viaturas['matricula'])),
                    ucwords(strtolower($viaturas['ano'])),
            
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
    //listar todas viaturas por filtragem
    public function getListCars(string $Order, int $Limit)
    {
        $this->table = "viaturas";
        $this->fields = "*";
        $this->condition = "Order by $Order Limit $Limit";
        $getListCars = $this->selectDB($this->fields, $this->table, $this->condition);
        return $getListCars->fetchAll(\PDO::FETCH_ASSOC);
    }

  //total viaturas
  public function viaturasTotal()
  {
      // Iniciar transação
      $this->transaction = $this->connectionDB();
      $this->transaction->beginTransaction();
      try {
          //$this->variable=$id;
          $this->table = "viaturas";
          $this->fields = "count(*) as total_viaturas";
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
    //pesquisa por filtragem todas as viaturas
    public function getAllCarsDatas(string $CarsDataSearch, int $Limit, string $Order)
    {
        $searchCondition = "";
        $params = [];

        // Verificar se há um critério de pesquisa
        if (!empty($CarsDataSearch)) {
            $searchCondition = "WHERE marca LIKE ? OR cor LIKE ? OR modelo LIKE ? OR matricula LIKE ? OR ano LIKE ? Order by $Order Limit $Limit";
            $params = [
               '%' . $CarsDataSearch . '%',
               '%' . $CarsDataSearch . '%',
                '%' . $CarsDataSearch . '%',
               '%' . $CarsDataSearch . '%',
                '%' . $CarsDataSearch . '%',
            ];
        }

        // Executar a consulta com parâmetros
        $getAllCarsDatas = $this->selectDB("*", "viaturas", $searchCondition, $params);

        // Retornar os resultados
        return $getAllCarsDatas->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllCars()
    {
        $this->table = "viaturas";
        $this->fields = "*";
        $this->condition = "Order by id_viatura desc limit 10";
        $getListUsers = $this->selectDB($this->fields, $this->table, $this->condition);
        return $getListUsers->fetchAll(\PDO::FETCH_ASSOC);
    }
    //seleciona uma viatura específica
    
    public function getFindCars($id)
    {
        // Iniciar transação
        $this->transaction = $this->connectionDB();
        $this->transaction->beginTransaction();
        try {
            $this->table = "viaturas";
            $this->fields = "*";
            $this->condition = "where id_viatura = :id";
            $this->params = [":id" => $id];
            $getFindCars = $this->selectDB($this->fields, $this->table, $this->condition, $this->params);

            // Commit da transação
            $this->transaction->commit();

            return $getFindCars->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Rollback da transação em caso de erro
            $this->transaction->rollback();

            // Adicione tratamento de erro aqui, se necessário
            return false;
        }
    }
// deleta um viatura específica
    public function getDeleteCars(int $id)
    {
        $this->table = "viaturas";
        $this->condition = "id_viatura = :Id";
        $this->params = [":Id" => $id];
        $getDeleteCars = $this->deleteDB($this->table, $this->condition, $this->params);
        return $getDeleteCars->rowCount();
    }
   
       //edita um viatura espécifia
       public function getUpdateCars(array $viaturas)
       {
           // Lógica de inserção no banco de dados
           if (!empty((isset($viaturas)))) :
               // Iniciar transação
               $this->transaction = $this->connectionDB();
               $this->transaction->beginTransaction();
   
               try {
                   //foto=:foto, path=:path,
                   $this->table = "viaturas";
                   $this->fields = "marca=:marca, modelo=:modelo, cor=:cor,	matricula=:matricula, ano=:ano, data_modificacao=NOW()";
                   $this->condition = "id_viatura =:id_viatura";
                   $this->params =
                       [
                    
                           ":id_viatura"=>intval($viaturas['idUpdateCars']),
                           ":marca" =>ucwords(strtolower($viaturas['marca'])) ,
                           ":modelo" => ucwords(strtolower($viaturas['modelo'])),
                           ":cor" => ucwords(strtolower($viaturas['cor'])),
                           ":matricula" => ucwords(strtolower($viaturas['matricula'])),
                           ":ano" => $viaturas['ano'],
                           
                          
   
                       ];
   
                   $getUpdateCars = $this->updateDB($this->table, $this->fields, $this->condition, $this->params);
                   // Commit da transação
                   $this->transaction->commit();
   
                   return $getUpdateCars->rowCount();
               } catch (\Exception $e) {
                   // Rollback da transação em caso de erro
                   $this->transaction->rollback();
   
                   // Adicione tratamento de erro aqui, se necessário
                   return false;
               }
           endif;
        }

        //seleciona as viaturas das equipes
        public function veiculos(){
            // Iniciar transação
            $this->transaction = $this->connectionDB();
            $this->transaction->beginTransaction();
            try {
               //$this->variable=$id;

                $this->table = "viaturas";
                $this->fields = "id_viatura, matricula";
                $this->condition = "order by data_criacao desc Limit 10";
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
