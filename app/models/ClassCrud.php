<?php
namespace App\Models;
use App\Models\classConnectionDB;

use PDO;
use PDOException;

class ClassCrud extends ClassConnectionDB
{
    private $crud;
    private $truncate;

    private function executeQuery($query, $params = [])
    {
        try {
            $this->crud = $this->connectionDB()->prepare($query);
            $this->crud->execute($params);
        } catch (PDOException $e) {
            // Handle database errors gracefully
            die("Database error: " . $e->getMessage());
        }
    }

    public function selectShowFindDB($fields, $table, $condition = "", $params = [])
    {
        $query = "SELECT {$fields} FROM {$table} {$condition}";
        $this->executeQuery($query, $params);
        return $this->crud;
    }

    public function insertCreateDB($table, $fields, $values, $params = [])
    {
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        $this->executeQuery($query, $params);
        return $this->crud;
    }

    public function deleteDestroyDB($table, $condition, $params = [])
    {
        $query = "DELETE FROM {$table} WHERE {$condition}";
        $this->executeQuery($query, $params);
        return $this->crud;
    }

    public function updateEditDB($table, $fields, $condition, $params = [])
    {
        $query = "UPDATE {$table} SET {$fields} WHERE {$condition}";
        $this->executeQuery($query, $params);
        return $this->crud; 
    }

    public function insertDB($table, $fields, $values, $params = [])
    {
        return $this->insertCreateDB($table, $fields, $values, $params);
    }

    public function selectDB($fields, $table, $condition = "", $params = [])
    {
        return $this->selectShowFindDB($fields, $table, $condition, $params);
    }

    public function deleteDB($table, $condition, $params = [])
    {
        return $this->deleteDestroyDB($table, $condition, $params);
    }

    public function truncateTableDB($table)
    {
        try {
            $this->truncate = $this->connectionDB()->prepare("TRUNCATE {$table}");
            return $this->truncate->execute();
        } catch (PDOException $e) {
            // Handle database errors gracefully
            die("Database error: " . $e->getMessage());
        }
    }

    public function updateDB($table, $fields, $condition, $params = [])
    {
        return $this->updateEditDB($table, $fields, $condition, $params);
    }

    // Function to perform a join query
    public function joinSelect($fields, $tables, $joins, $condition = "", $params = [])
    {
        $query = "SELECT {$fields} FROM {$tables} {$joins} {$condition}";
        $this->executeQuery($query, $params);
        return $this->crud;
    }
}


/*
namespace App\Models;


class classCrud extends classConnectionDB
{
    #Atributos
    private $crud;
    private $counter;
    private $truncate;

    #Responsible by prepare a query
    private function prepareExecute($query, $exec)
    {
        $this->crud = $this->connectionDB()->prepare($query);
        $this->crud->execute($exec);
    }
    #Responsible by select datas at DB
    public function selectShowFindDB($fields, $table, $condition, $exec)
    {
        $this->prepareExecute("SELECT {$fields} FROM {$table} {$condition}", $exec);

        return $this->crud;
    }
    #Responsible by insert datas at DB
    public function insertCreateDB($table, $fields, $values, $exec)
    {
        $this->preparedStatements("INSERT INTO {$table} ({$fields}) VALUES  ({$values})", $exec);
        return $this->crud;
    }

    #Responsible by Delete data at DB
    public function deleteDestroyDB($table, $condition, $exec)
    {
        $this->preparedStatements("DELETE FROM {$table} WHERE {$condition}", $exec);
        return $this->crud;
    }


    #Responsible by Update data at DB
    public function updateEditDB($table, $fields, $condition, $exec)
    {
        $this->preparedStatements("UPDATE {$table} SET {$fields} WHERE {$condition}", $exec);
        return $this->crud;
    }
    #----------------------Solução Similar : OTHER SOLUTION-----------------------

    #Responsible by prepared statament of query and execution
    private function preparedStatements($query, $parameter)
    {
        $this->parameterCounter($parameter);
        $this->crud = $this->connectionDB()->prepare($query);

        #echo $this->counter;
        #Verificate if the sql query there exists parameters
        if ($this->counter > 0) {
            for ($i = 1; $i <= $this->counter; $i++) {
                $this->crud->bindParam($i, $parameter[$i - 1]);
            }
        }

        $this->crud->execute();
    }

    #Parameters counter
    private function parameterCounter($parameter)
    {
        $this->counter = count($parameter);
    }

    #Responsible by insert datas at DB
    public function insertDB($table, $fields, $values, $parameter)
    {
        $this->preparedStatements("INSERT INTO {$table} ({$fields}) VALUES  ({$values})", $parameter);
        return $this->crud;
    }

    #Responsible by select datas at DB (one Table - without joins)
    public function selectDB($fields, $table, $condition, $parameter)
    {
        $this->preparedStatements("SELECT {$fields} FROM {$table} {$condition}", $parameter);
        return $this->crud;
    }

    #Responsible by Delete data at DB
    public function deleteDB($table, $condition, $parameter)
    {
        $this->preparedStatements("DELETE FROM {$table} WHERE {$condition}", $parameter);
        return $this->crud;
    }
    #Responsible by Truncate data at DB
    public function truncateTableDB($table)
    {
        $this->truncate = $this->connectionDB()->prepare("TRUNCATE {$table}");
        return $this->truncate->execute();
    }

    #Responsible by Update data at DB
    public function updateDB($table, $fields, $condition, $parameter)
    {
        $this->preparedStatements("UPDATE {$table} SET {$fields} WHERE {$condition}", $parameter);
        return $this->crud;
    }
}
*/
