<?php

namespace App\Model;

use App\Helpers\Database; // Ensure this path is correct and the Database class exists

class Orm extends Database
{

    protected $model;

    public function __construct($model)
    {
        parent::__construct();
        $this->model = $model;
        if (!isset($_SESSION[$model])) {
            $_SESSION[$model] = [];
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->model WHERE id = :id";
        $params = [":id" => $id];
        $result = $this->queryDataBase($sql, $params);
        $result = $result != null ? $result->fetch() : null;
        return $result;
    }

    public function removeItemById($id)
    {
        $sql = "DELETE FROM $this->model WHERE id = :id";
        $params = [":id" => $id];
        $result = $this->queryDataBase($sql, $params);
        if ($result != null) {
            $_SESSION[$this->model] = $this->getAll();
        }
        return $result;
    }

    public function create($item)
    {
        $colums = implode(", ", array_keys($item));
        $values = ":" . implode(", :", array_keys($item));
        $sql = "INSERT INTO $this->model ($colums) VALUES ($values)";
        $params = [];
        foreach ($item as $key => $value) {
            $params[":$key"] = $value;
        }
        $id = $this->queryDataBase($sql, $params, true);
        $result = $this->getById($id);
        if ($result != null) {
            $_SESSION[$this->model] = $this->getAll();
        }

        return $result;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->model";
        $result = $this->queryDataBase($sql);
        if ($result != null) $result = $result->fetchAll();
        $_SESSION[$this->model] = $result;

        return $_SESSION[$this->model];
    }

    public function updateItemById($itemUpdated)
    {
        $set = "";
        foreach ($itemUpdated as $key => $value) {
            if ($key != 'id') {
                $set = $set . "$key=:$key, ";
            }
        }
        $set = substr($set, 0, -2);
        $params = [];
        foreach ($itemUpdated as $key => $value) {
            $params[":$key"] = $value;
        }
        $sql = "UPDATE $this->model SET $set WHERE id=:id";
        $result = $this->queryDataBase($sql, $params);
        if ($result != null) {
            $_SESSION[$this->model] = $this->getAll();
        }
        
        return $result;
    }

    public function reset()
    {
        $sql = "DELETE FROM $this->model";
        $result = $this->queryDataBase($sql);
        unset($_SESSION[$this->model]);
    }
}
