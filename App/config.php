<?php



$projects = [
    [
        'id' => 0,
        'nom' => 'Projecte 1',
        'descripcio' => 'Descripció del projecte 1',
        'data_inici' => '2025-01-01',
        'data_fi' => '2025-02-01',
        'id_usuari' => 0,
        'estat' => 0
    ],
    [
        'id' => 1,
        'nom' => 'Projecte 2',
        'descripcio' => 'Descripció del projecte 2',
        'data_inici' => '2021-02-01',
        'data_fi' => '2021-03-01',
        'id_usuari' => 1,
        'estat'=> 1   
    ],
    [
        'id' => 2,
        'nom' => 'Projecte 3',
        'descripcio' => 'Descripció del projecte 3',
        'data_inici' => '2021-02-01',
        'data_fi' => '2021-03-01',
        'id_usuari' => 2,
        'estat' => 2
    ],
    [
        'id' => 3,
        'nom' => 'Projecte 4',
        'descripcio' => 'Descripció del projecte 4',
        'data_inici' => '2021-02-01',
        'data_fi' => '2021-03-01',
        'id_usuari' => 2,
        'estat'=> 0  
    ],
    [
        'id' => 4,
        'nom' => 'Projecte 5',
        'descripcio' => 'Descripció del projecte 5',
        'data_inici' => '2021-02-01',
        'data_fi' => '2021-03-01',
        'id_usuari' => 1,
        'estat'=> 1  
    ],
    [
        'id' => 5,
        'nom' => 'Projecte 6',
        'descripcio' => 'Descripció del projecte 6',
        'data_inici' => '2021-06-01',
        'data_fi' => '2021-07-01',
        'id_usuari' => 2,
        'estat'=> 2   
    ],
    [
        'id' => 6,
        'nom' => 'Projecte 7',
        'descripcio' => 'Descripció del projecte 7',
        'data_inici' => '2021-06-01',
        'data_fi' => '2021-07-01',
        'id_usuari' => 0,
        'estat'=> 0   
    ],
    [
        'id' => 7,
        'nom' => 'Projecte 8',
        'descripcio' => 'Descripció del projecte 8',
        'data_inici' => '2021-06-01',
        'data_fi' => '2021-07-01',
        'id_usuari' => 1,
        'estat'=> 1   
    ],
    [
        'id' => 8,
        'nom' => 'Projecte 9',
        'descripcio' => 'Descripció del projecte 9',
        'data_inici' => '2021-06-01',
        'data_fi' => '2021-07-01',
        'id_usuari' => 2,
        'estat'=> 2   
    ],
    [
        'id' => 9,
        'nom' => 'Projecte 10',
        'descripcio' => 'Descripció del projecte 10',
        'data_inici' => '2021-06-01',
        'data_fi' => '2021-07-01',
        'id_usuari' => 1,
        'estat'=> 0  
    ] 
    ];


$users = [
    [
        'id' => 0,
        'nom' => 'Toni',
        'cognom' => 'Fernandez',
        'username' => 'admin',
        'password' => '123',
        'admin' => true
    ],
    [
        'id' => 1,
        'nom' => 'Raquel',
        'cognom' => 'Boronat',
        'username' => 'raquel',
        'password' => '123',
        'admin' => false
    ],
    [
        'id' => 2,
        'nom' => 'Juan',
        'cognom' => 'Torres',
        'username' => 'juan',
        'password' => '123',
        'admin' => false
    ]
];

if (!isset($_SESSION['projects'])) $_SESSION['projects'] = $projects;
if (!isset($_SESSION['users'])) $_SESSION['users'] = $users;
        