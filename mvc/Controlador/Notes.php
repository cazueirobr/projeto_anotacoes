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
        $mensagens = Nota::buscarTodos();
        $this->visao('inicial/usuarioLogado.php',['mensagens' => $mensagens]);
    }


    public function pesquisar()
    {
        $pesquisa = Nota::pesquisar($_POST['pesquisa']);
        $this->visao('inicial/index.php',['mensagens' => $pesquisa]);
    }

    public function logadoSistema(){
        $this->visao('inicial/usuarioLogado.php');
    }

    public function minhasAnotacoes(){
        $this->verificarLogado();
        $mensagens = Nota::minhasAnotacoes(DW3Sessao::get('usuario'));
        $this->visao('inicial/minhasAnotacoes.php',['mensagens' => $mensagens]);
    }

}
