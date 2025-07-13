<?php

namespace Src\Interfaces;

interface InterfaceCrud
{
    public function insertDB($table, $fields, $values, $params = []);
    public function  selectDB($fields, $table, $condition = "", $params = []);
    public function deleteDB($table, $condition, $params = []);
    public function truncateTableDB($table);
    public function updateDB($table, $fields, $condition, $params = []);
    public function joinSelect($fields, $tables, $joins, $condition = "", $params = []);
}
