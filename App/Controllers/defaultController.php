<?php

use App\Helpers\Database;

class defaultController extends Controller
{


    public function index($values = null)
    {
        if (!isset($_SESSION['user_logged'])) {
            $this->loadData();
            $params['title'] = 'Home';
            $this->render('home/index', $params, 'site');
        } else {
            //enviar a l'aplicació
        }
    }

    public function login($values = null)
    {
        if (!isset($_SESSION['user_logged'])) {
            $params['title'] = 'Login';
            $this->render('/user/login', $params, 'site');
        } else {
            //enviar a l'aplicació
        }
    }

    public function register($values = null)
    {
        if (!isset($_SESSION['user_logged'])) {
            $params['title'] = 'Registre';
            $this->render('/user/register', $params, 'site');
        } else {
            //enviar a l'aplicació
        }
    }

    private function loadData()
    {
        if (!isset($_SESSION['data_loaded'])) {
            //Carrega les dades nomes un cop

            $_SESSION['data_loaded'] = true;

            $db = new Database();
            $sql = "DROP TABLE IF EXISTS users,projects";
            $db->queryDataBase($sql);

            $user = [
                'nom' => 'Toni',
                'cognom' => 'Fernandez',
                'username' => 'admin',
                'password' => '123',
                'admin' => true
            ];
            $newUser = new User();
            $newUser->create($user);

            $user = [
                'nom' => 'Raquel',
                'cognom' => 'Boronat',
                'username' => 'raquel',
                'password' => '123',
                'admin' => 0
            ];

            $newUser = new User();
            $newUser->create($user);

            $user = [
                'nom' => 'Juan',
                'cognom' => 'Torres',
                'username' => 'juan',
                'password' => '123',
                'admin' => 0
            ];

            $newUser = new User();
            $newUser->create($user);

            $projects = [
                [
                    'nom' => 'Projecte 1',
                    'descripcio' => 'Descripció del projecte 1',
                    'data_inici' => '2025-01-01',
                    'data_fi' => '2025-02-01',
                    'id_usuari' => 0,
                    'estat' => 0
                ],
                [
                    'nom' => 'Projecte 2',
                    'descripcio' => 'Descripció del projecte 2',
                    'data_inici' => '2021-02-01',
                    'data_fi' => '2021-03-01',
                    'id_usuari' => 1,
                    'estat' => 1
                ],
                [
                    'nom' => 'Projecte 3',
                    'descripcio' => 'Descripció del projecte 3',
                    'data_inici' => '2021-02-01',
                    'data_fi' => '2021-03-01',
                    'id_usuari' => 2,
                    'estat' => 2
                ],
                [
                    'nom' => 'Projecte 4',
                    'descripcio' => 'Descripció del projecte 4',
                    'data_inici' => '2021-02-01',
                    'data_fi' => '2021-03-01',
                    'id_usuari' => 2,
                    'estat' => 0
                ],
                [
                    'nom' => 'Projecte 5',
                    'descripcio' => 'Descripció del projecte 5',
                    'data_inici' => '2021-02-01',
                    'data_fi' => '2021-03-01',
                    'id_usuari' => 1,
                    'estat' => 1
                ],
                [
                    'nom' => 'Projecte 6',
                    'descripcio' => 'Descripció del projecte 6',
                    'data_inici' => '2021-06-01',
                    'data_fi' => '2021-07-01',
                    'id_usuari' => 2,
                    'estat' => 2
                ],
                [
                    'nom' => 'Projecte 7',
                    'descripcio' => 'Descripció del projecte 7',
                    'data_inici' => '2021-06-01',
                    'data_fi' => '2021-07-01',
                    'id_usuari' => 0,
                    'estat' => 0
                ],
                [
                    'nom' => 'Projecte 8',
                    'descripcio' => 'Descripció del projecte 8',
                    'data_inici' => '2021-06-01',
                    'data_fi' => '2021-07-01',
                    'id_usuari' => 1,
                    'estat' => 1
                ],
                [
                    'nom' => 'Projecte 9',
                    'descripcio' => 'Descripció del projecte 9',
                    'data_inici' => '2021-06-01',
                    'data_fi' => '2021-07-01',
                    'id_usuari' => 2,
                    'estat' => 2
                ],
                [
                    'nom' => 'Projecte 10',
                    'descripcio' => 'Descripció del projecte 10',
                    'data_inici' => '2021-06-01',
                    'data_fi' => '2021-07-01',
                    'id_usuari' => 1,
                    'estat' => 0
                ]
            ];
            $newProject = new Project();
            foreach ($projects as $project) {
                $newProject = new Project();
                $newProject->create($project);
            }
        }
    }
}
