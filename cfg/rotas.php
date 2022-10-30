<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\AppControlador#index',
    ],

    '/registrar' => [
        'GET' => "\Controlador\AppControlador#registrar",
        'POST' => '\Controlador\AppControlador#armazenarUsuario',
    ]
];
