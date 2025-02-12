<?php

class projectController extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['user_logged'])) {
            header('Location: /default/index');
        } else {
            $this->showProjects();
        }
    }

    public function showProjects()
    {
        //comrpovem si som admin o user
        $this->userLogged();
        if ($_SESSION['user_logged']['admin']) {
            //si som admin mostrem tots els projectes
            $params['title'] = "Projects";
            $params['user_logged'] = $_SESSION['user_logged'];
            $params['projects'] = $_SESSION['projects'];
            $params['message'] = $_SESSION['message'] ?? null;
            unset($_SESSION['message']);
            $this->render("projects/user", $params, "admin");
        } else {
            //si som user mostrem els projectes de l'usuari
            $projects = [];
            foreach ($_SESSION['projects'] as $project) {
                if ($project['id_usuari'] == $_SESSION['user_logged']['id']) {
                    $projects[] = $project;
                }
            }
            $params['title'] = "Projects";
            $params['user_logged'] = $_SESSION['user_logged'];
            $params['projects'] = $projects;
            $params['message'] = $_SESSION['message'] ?? null;
            unset($_SESSION['message']);
            $this->render("projects/user", $params, "main");
        }
    }

    public function show($id)
    {
        //mostra la info del projecte amb id=$id 
        $this->userLogged();       
        $project = new Project;
        $params['title'] = "Info Projecte";
        $params['user_logged'] = $_SESSION['user_logged'];
        //recuperem el projecte amb id=$id
        $params['project'] = $project->getById($id[0]);
        //recuperem els col·laboradors del projecte
        $params['owner'] = $project->getProjectOwner($project->getById($id[0]));
        // $this->showData($params);
        $this->render("projects/show", $params, "main");
    }

    public function edit($id)
    {
        //mostra el formulari per editar el projecte amb id=$id
        $this->userLogged();
        $project = new Project;
        $params['title'] = "Editar Projecte";
        $params['user_logged'] = $_SESSION['user_logged'];
        //recuperem el projecte amb id=$id
        $params['project'] = $project->getById($id[0]);
        //recuperem els col·laboradors del projecte
        $params['owner'] = $project->getProjectOwner($project->getById($id[0]));
        $this->render("projects/edit", $params, "main");
    }

    public function store()
    //desem el projecte actualitzat
    {
        $this->userLogged();
        //recuperem el POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['nom'] ?? null;
            $description = $_POST['descripcio'] ?? null;
            $data_inici = $_POST['data_inici'] ?? null;
            $data_fi = $_POST['data_fi'] ?? null;
            $estat = $_POST['estat'] ?? null;
            $id = $_POST['id'] ?? null;
            $id_usuari = $_POST['id_usuari'] ?? null;
        }
        //actualitzem el projecte
        $projectUpdated = [
            'id' => $id,
            'nom' => $name,
            'descripcio' => $description,
            'data_inici' => $data_inici,
            'data_fi' => $data_fi,
            'id_usuari' => $id_usuari,
            'estat' => $estat
        ];
        //Amb el model el desem a la variable de sessió
        $p = new Project;
        $p->updateItemById($projectUpdated);
        //mostrem el missatge de confirmació
        $_SESSION['message'] = "El projecte " . $name . " s'ha actualitzat correctament";
        //tornem a mostrar els projectes
        $this->showProjects();
    }


    public function delete()
    {
        $this->userLogged();
        //recuperem el post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
        }
        //eliminem el projecte amb id=$id
        $p = new Project;
        $project = $p->getById($id);
        $p->removeItemById($id);
        //mostrem el missatge de confirmació
        $_SESSION['message'] = "El projecte " . $project['nom'] . " s'ha eliminat correctament";
        $this->showProjects();
    }

    public function new()
    {
        //mostra la vista per crear un nou projecte
        $this->userLogged();        
        $params['title'] = "Nou Projecte";
        $params['user_logged'] = $_SESSION['user_logged'];
        $params['owner'] = $_SESSION['user_logged']['nom'] . " " . $_SESSION['user_logged']['cognom'];
        $this->render("projects/create", $params, "main");
    }

    public function create()
    {
        $this->userLogged();
        //recuperem el post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['nom'] ?? null;
            $description = $_POST['descripcio'] ?? null;
            $data_inici = $_POST['data_inici'] ?? null;
            $data_fi = $_POST['data_fi'] ?? null;
            $id_usuari = $_SESSION['user_logged']['id'];
            $estat = $_POST['estat'] ?? null;
        }
        //creem el nou projecte
        $p = new Project;
        $newproject = [
            'id' => $_SESSION['id_project']++,
            'nom' => $name,
            'descripcio' => $description,
            'data_inici' => $data_inici,
            'data_fi' => $data_fi,
            'id_usuari' => $id_usuari,
            'estat' => $estat
        ];
        $p->create($newproject);
        //mostrem el missatge de confirmació
        $_SESSION['message'] = "El projecte " . $name . " s'ha creat correctament";
    
        $this->showProjects();

    }
}
