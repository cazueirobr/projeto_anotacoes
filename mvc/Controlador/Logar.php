<?php
namespace Controlador;
use \Modelo\Conta;
use \Modelo\Nota;
use \Framework\DW3Sessao;
class Logar extends Controlador
{
    public function login()
    {
        $this->visao('inicial/login.php');
    }

    public function armazenar()
    {
        $usuario = Conta::buscarEmail($_POST['email']);
        if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
            DW3Sessao::set('usuario', $usuario->getId());
        $this->redirecionar(URL_RAIZ . 'notes');
        }
        else{
            $this->visao('inicial/login.php');
        }
        
    }

    public function destruir()
    {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ . 'logar');
    }

}
