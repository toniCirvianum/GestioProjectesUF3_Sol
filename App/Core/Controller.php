<?php

class Controller
{
    protected function render($path, $params = [], $layout = "")
    {
        //rennderitzar la vista
        // echo "estic a punt per renderitzar la vista del Main Controller";
        ob_start();
        require_once(__DIR__ . "/../Views/" . $path . ".view.php");
        $params['content'] = ob_get_clean();
        require_once(__DIR__ . "/../Views/layouts/" . $layout . ".layout.php");
    }

    public function validate($data, $updateUsername)
    {
        //valida les dades que li passem
        $username = $data['username'];
        $password = $data['password'];
        $cpassword = $data['cpassword'];

        if (!$this->validateUsername($username)) {
            return "El username ha de tenir minuscules i entre 4 i 20 caracters";
        }

        if (!$this->uniqueUsername($username) && $updateUsername) {
            return "El username ja existeix";
        }

        if ($password != $cpassword) {
            return "Les contrasenyes no coincideixen";
        }

        if (!$this->validatePassword($password)) {
            return "La contrasenya ha de tenir almenys 8 caracters, una minúscula i una majúscula";
        }

        return null;
    }


    public function validateUsername($username)
    {
        //validar que el username tingui entre 4 i 20 caracters
        if (preg_match('/^[a-z]{4,20}$/', $username)) {
            return true;
        }
        return false;
    }

    public function validatePassword($password)
    {
        // Verificar que la contraseña tiene al menos 8 caracteres, una minúscula y una mayúscula
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
            return true;
        }
        return false;
    }

    public function uniqueUsername($username)
    {
        //validar que el username no estigui repetit
        $user = new User;
        if ($user->getByUsername($username)) {
            return false;
        }
        return true;
    }

    public function showData($data)
    {
        echo "<pre>";
        if (is_array($data)) {
            print_r($data);
        } else {
            echo $data;
        }
        echo "</pre>";
    }

    public function userLogged()
    //comprova si l'usuari esta logejat
    {
        if (isset($_SESSION['user_logged'])) {
            return true;
        } else {
            header("Location: /");
            exit;
        }
    }
}
