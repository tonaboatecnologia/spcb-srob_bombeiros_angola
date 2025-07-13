<?php 
namespace App\Models;


abstract class classConnectionDB{
    protected function connectionDB()
    {
        try{
            $con = new \PDO("mysql:host=".HOST.";dbname=".DBNAME."", "".USER."", "".PASSWORD."");
            return $con;
        }catch (\PDOException $erro){
            return $erro->getMessage();
        }
    }
}