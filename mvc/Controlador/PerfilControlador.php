<?php
namespace Controlador;
use \Modelo\Conta;
use \Framework\DW3Controlador;
use \Framework\DW3Sessao;

class PerfilControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $perfil = $this->getUsuario();
        $this->visao('inicial/editarUsuario.php',['perfil' => $perfil]);
    }

    public function atualizar()
    {
        $this->verificarLogado();
        $perfil = $this->getUsuario();
        $perfil->setNome($_POST['nome']);
        $perfil->setEmail($_POST['email']);
        if(!empty($_POST['senha1']) and $_POST['senha1'] == $_POST['senha2'] ){
            $perfil->setSenha(password_hash($_POST['senha1'], PASSWORD_BCRYPT));
            $perfil->atualizarComSenha();
        }
        else{
            $perfil->atualizar();
        }
        #$perfil->salvar();
        $this->redirecionar(URL_RAIZ . 'notes/minhas');
    }

}


?>