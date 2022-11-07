<?php
namespace Controlador;
use \Modelo\Nota;
use \Framework\DW3Sessao;
class Notes extends Controlador
{
    public function index()
    {
        $mensagens = Nota::buscarTodos();
        $this->visao('inicial/index.php',['mensagens' => $mensagens]);
    }

    public function indexLogado(){
        $this->verificarLogado();
        $teste = $this->verificarLogado();
        var_dump($teste);
        exit;
        $mensagens = Nota::buscarTodos();
        $this->visao('inicial/usuarioLogado.php',['mensagens' => $mensagens]);
    }

    public function registrar()
    {
        $this->visao('inicial/registrar.php');
    }

    public function pesquisar()
    {
        $pesquisa = Nota::pesquisar($_POST['pesquisa']);
        $this->visao('inicial/index.php',['mensagens' => $pesquisa]);
    }

    public function logadoSistema(){
        $this->visao('inicial/usuarioLogado.php');
    }

}
