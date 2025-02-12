<?php

class adminController extends Controller
{


    public function showUsers()
    {
        //mostra els usuaris de l'aplicació en format de card
        if ($_SESSION['user_logged']['admin']) {
            $u = new User;
            $params['title'] = "Usuaris";
            $params['user_logged'] = $_SESSION['user_logged'];
            $params['users'] = $u->getAll();
            $this->render("admin/showusers", $params, "admin");
        } else {
            header('Location: /project/showProjects');
        }
    }

    public function promote()
    {
        //promou un usuari a admin
        if ($_SESSION['user_logged']['admin']) {
            $u = new User;
            $u->promote($_POST['id']);
            $_SESSION['message'] = "Usuari promogut a admin!";
            $this->showUsers();
        } else {
            header('Location: /project/showProjects');
        }
    }

    public function showuser()
    {
        //mostra la info d'un usuari
        if ($_SESSION['user_logged']['admin']) {
            $u = new User;
            $params['title'] = "Info Usuari";
            $params['user_logged'] = $_SESSION['user_logged'];
            $params['user'] = $u->getById($_POST['id']);
            $this->render("admin/edituser", $params, "admin");
        } else {
            header('Location: /project/showProjects');
        }
    }

    public function storeuser()
    {
        // $this->showData($_POST);
        //recuperem dades del post
        if ($_SESSION['user_logged']['admin']) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'] ?? null;
                $name = $_POST['nom'] ?? null;
                $surname = $_POST['cognom'] ?? null;
                $username = $_POST['username'] ?? null;
                $password = $_POST['password'] ?? null;
                $cpassword = $_POST['cpassword'] ?? null;
            }
            //com que l'usuari ha de ser unic comprovem si s'ha modificat
            $u = new User;
            $old_user=$u->getById($_POST['id']); //aconseguim el username de l'usuari a modificar per comparar
            if ($username != $old_user['username']) {
                $updateUsername = true;
            } else {
                $updateUsername = false;
            }
            //fem les validacions, passem true perquè comprovi si l'usuari ja existeix
            if (is_null($this->validate($_POST,$updateUsername))) {
                //actualitzem usuari
                $user = new User;
                $user->updateItemById(
                    [
                        'id' => $id,
                        'nom' => $name,
                        'cognom' => $surname,
                        'username' => $username,
                        'password' => $password,
                        'admin' => $old_user['admin']
                    ]
                );
                //redirigim a la vista de l'aplicació
                $_SESSION['message'] = "Usuari actualitzat correctament";
                $this->showUsers();
                exit;
            } else {
                //si hi ha errors els mostrem
                $params['message'] = $this->validate($_POST,$updateUsername);
                $params['user'] = $_POST;
                $this->render("admin/edituser", $params, "admin");
            }
        } else {
            header('Location: /project/showProjects');
        }
    }

    public function deleteuser() {
        //elimina un usuari
        if ($_SESSION['user_logged']['admin']) {
            $u = new User;
            $user = $u->getById($_POST['id']);
            $u->removeItemById($_POST['id']);
            $P = new Project;
            $P->removeProjectByUser($_POST['id']);
            $_SESSION['message'] = "L'usuari " . $user['username'] . " s'ha eliminat correctament i també tots els seus projectes";
            $this->showUsers();
        } else {
            header('Location: /project/showProjects');
        }
    }
}
