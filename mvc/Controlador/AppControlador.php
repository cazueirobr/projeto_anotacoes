<?php
namespace Controlador;
use \Modelo\Conta;
class AppControlador extends Controlador
{

    public function registrar()
    {
        $this->visao('inicial/registrar.php');
    }

    public function armazenarUsuario()
    {
        $usuario = new Conta($_POST['nome'],
            $_POST['email'],
            $_POST['senha'],
        );
        $usuario->salvar();
        $this->redirecionar(URL_RAIZ);
    }

}
