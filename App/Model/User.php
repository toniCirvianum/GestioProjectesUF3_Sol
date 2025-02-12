<?php

use App\Model\Orm;

class User extends Orm
{

    public function __construct()
    {
        parent::__construct('users');
        if (!isset($_SESSION['id_user'])) {
            $_SESSION['id_user'] = 4;
        }
        $this->createTable();
    }

    public function createTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS users(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(250) NOT NULL,
            cognom VARCHAR(250) NOT NULL,
            username VARCHAR(250) NOT NULL,
            password VARCHAR(250) NOT NULL,
            admin BOOLEAN NOT NULL DEFAULT 0
            ) ENGINE = InnoDB;';
        $this->queryDataBase($sql);
    }

    public function login($us, $pass)
    {
        foreach ($_SESSION[$this->model] as $user) {
            if ($user['username'] == $us) {
                if ($user['password'] == $pass) {
                    return $user;
                }
            }
        }
        return null;
    }

    public function getByUsername($username)
    {
        foreach ($_SESSION[$this->model] as $user) {
            if ($user['username'] == $username) {
                return $user;
            }
        }
        return null;
    }

    public function promote($id)
    {
        //promo a admin usuari amb id=$id
        foreach ($_SESSION[$this->model] as $key => $user) {
            if ($user['id'] == $id) {
                $_SESSION[$this->model][$key]['admin'] = 1;
            }
        }
        return $user;
    }
}
