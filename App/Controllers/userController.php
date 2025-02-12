<?php



class userController extends Controller
{

    public function index()
    {
        //flas s'utilitza per mostrar missatge a la vista
        // $params['message'] = $_SESSION['message'];
        // //un cop desada a params, la esborrem per tenir-la disponible en altres vistes
        // unset($_SESSION['message']);
        $params['title'] = "Login";
        $params['message']= $_SESSION['message'] ?? null;
        unset($_SESSION['message']);
        $this->render("user/login", $params, "site");
    }



    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Recuperem les dades via post
            $username = $_POST['username'] ?? null;
            $password = $_POST['pass'] ?? null;
            //Instanciem un nou model per comprovar credencials
            $user = new User;
            if (is_null($user->login($username, $password))) {
                //Si son incorrectes cridem a la vista amb el missatge corresponet
                $_SESSION['message'] = "Credencials incorrectes!";
                $this->index();
            } else {
                //Si son corectes desem l'usuari logejat
                $_SESSION['user_logged'] = $user->login($username, $password);
                //Inicialitzem la vista de l'aplicació
                header('Location: /project/index');
                exit;
                $_SESSION['message_view'] = "Credencials incorrectes!";
                $this->index();
            }  
            }
        }
    

    
        public function logout()
    {
        $this->userLogged();
        // echo"estic al logout";
        unset($_SESSION['user_logged']); //Esborrem variable user
        // $this->render('/home/index', null, 'main'); //tornem al login
        header('Location: /default/index');
    }

    public function register()
    {
        //Recuperar dades del post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['nom'] ?? null;
            $surname = $_POST['cognom'] ?? null;
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;
            $cpassword = $_POST['cpassword'] ?? null;
        }
        //fem les validacions, passem true perquè comprovi si l'usuari ja existeix
        if (is_null($this->validate($_POST,true))) {
            //registrem usuari
            // $this->showData("Usuari registrat correctament");
            $user = new User;
            $user->create(
                [
                    'id' => $_SESSION['id_user'],
                    'nom' => $name,
                    'cognom' => $surname,
                    'username' => $username,
                    'password' => $password,
                    'admin' => false
                ]
            );
            $_SESSION['user_logged'] = $user->getById($_SESSION['id_user']);
            //redirigim a la vista de l'aplicació
            header('Location: /project/index');
            exit;
        } else {
            //enviem el psot per no perdre les dades
            $params['user_data'] = $_POST;
            $params['message'] = $this->validate($_POST,true);
            $this->render('user/register', $params, 'site');
        }
    }

    public function profile()
    {
        //carregar la vista del perfil
        if (!isset($_SESSION['user_logged'])) {
            header('Location: /default/index');
            exit;
        } else {
            $params['title'] = "Profile";
            $params['user_logged'] = $_SESSION['user_logged'];
            isset($_SESSION['params']) ? $params['message'] = $_SESSION['params'] : null;
            unset($_SESSION['params']);
            $this->render('user/profile', $params, 'main');
        }
    }

    public function editProfile()
    {
        $this->userLogged();
        //Recuperar dades del post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['nom'] ?? $_SESSION['user_logged']['nom'];
            $surname = $_POST['cognom'] ?? $_SESSION['user_logged']['cognom'];
            $username = $_POST['username'] ?? $_SESSION['user_logged']['username'];
            $password = $_POST['password'] ?? $_SESSION['user_logged']['password'];
            $cpassword = $_POST['cpassword'] ?? $_SESSION['user_logged']['password'];
        }
        //com que l'usuari ha de ser unic comprovem si s'ha modificat
        if ($username != $_SESSION['user_logged']['username']) {
            $updateUsername = true;
            }
        else {
            $updateUsername = false;
        }
        // $this->showData($_POST);
        // $this->showData("sesion user logged");
        if (is_null($this->validate($_POST,$updateUsername))) {
            //actualitzem usuari
            $user = new User;
            $user->updateItemById(
                [
                    'id' => $_SESSION['user_logged']['id'],
                    'nom' => $name,
                    'cognom' => $surname,
                    'username' => $username,
                    'password' => $password,
                    'admin' => $_SESSION['user_logged']['admin']
                ]
            );
            $_SESSION['user_logged'] = $user->getById($_SESSION['user_logged']['id']);
            //redirigim a la vista de l'aplicació
            // header('Location: /project/index');
            $_SESSION['message']="Usuari actualitzat correctament";
            header('Location: /project/showProjects');
            exit;
        } else {
            //enviem el psot per no perdre les dades
            // $params['user_data'] = $_POST;
            $_SESSION['params'] = $this->validate($_POST,$updateUsername);
            $this->profile();
        }
    }
}
