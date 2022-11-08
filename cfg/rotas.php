<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\Notes#index',
        'POST' => '\Controlador\Notes#pesquisar'
    ],

    '/registrar' => [
        'GET' => "\Controlador\AppControlador#registrar",
        'POST' => '\Controlador\AppControlador#armazenarUsuario',
    ],

    '/logar' => [
        'GET' => "\Controlador\Logar#login",
        'POST' => '\Controlador\Logar#armazenar',
        'DELETE' => '\Controlador\Logar#destruir',
    ],

    '/notes' => [
        'GET' => "\Controlador\Notes#indexLogado",
        'POST' => '\Controlador\Notes#armazenar',
    ],
    '/notes/?' => [
        'GET' => '\Controlador\Notes#mostrar',
        'PATCH' => '\Controlador\Notes#atualizar',
    ],
    '/notes/criar' => [
        'GET' => '\Controlador\Notes#criar',
        'POST' => '\Controlador\Notes#armazenarAnotacoes',
    ],

    '/notes/minhas' => [
        'GET' => '\Controlador\Notes#minhasAnotacoes',
    ],

];
