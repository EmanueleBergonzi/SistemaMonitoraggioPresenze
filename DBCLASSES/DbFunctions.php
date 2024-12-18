<?php

require_once('Config.php'); 

class DBFuncs
{
    private $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }

    protected function dbSelect($sql, $params) 
    {
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute($params);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function dbSelectRow($sql, $params)
    {
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    protected function dbSelectScalar($sql, $params)
    {
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if($row)
            $val = $row[0];
        else
            $val = null;
        return $val;
    }


    protected function dbExec($sql, $params) 
    {
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute($params);
        return $res;
    }

}