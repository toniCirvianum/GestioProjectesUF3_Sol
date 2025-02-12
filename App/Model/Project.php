<?php

use App\Model\Orm;

class Project extends Orm  {

    public function __construct()
    {
        parent::__construct('projects');
        if (!isset($_SESSION['id_project'])) {
            $_SESSION['id_project']=11;
            //Al config.php l'ultim id es el 9
        }
        $this->createTable();
        
    }
    public function createTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS projects(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(250) NOT NULL,
            descripcio VARCHAR(250) NOT NULL,
            data_inici VARCHAR(250) NOT NULL,
            data_fi VARCHAR(250) NOT NULL,
            estat INT NOT NULL,
            id_usuari INT NOT NULL            
            ) ENGINE = InnoDB;';
        $this->queryDataBase($sql);
    }


   

    public function getProjectOwner($project) {
        $u = new User;
        $user = $u->getById($project['id_usuari']);
        $owner = $user['nom']." ".$user['cognom'];
        return $owner;
    }

    public function removeProjectByUser($id) {
        //elimina el projecte amb id_usuari=$id
        foreach ($_SESSION[$this->model] as $key => $project) {
            if ($project['id_usuari'] == $id) {
                unset($_SESSION[$this->model][$key]);
            }
        }
    }




}


?>