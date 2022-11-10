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
        $teste =  $this->getUsuario();
        $this->visao('inicial/usuarioLogado.php',['mensagens' => $mensagens, 'dados' =>  $teste->getNome()]);
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

    public function criar()
    {
        $this->verificarLogado();
        $this->visao('inicial/criarAnotacoes.php');
    }

    public function armazenarAnotacoes(){
        $usuario = new Nota($_POST['titulo'],
        $_POST['texto'],
        DW3Sessao::get('usuario'),
    );
    $usuario->salvar();
    $this->redirecionar(URL_RAIZ . 'notes');
    }

   
    public function mostrar($id){
        $anotacao = Nota::buscarId($id);
        $atual = DW3Sessao::get('usuario');
        if($atual == $anotacao->getIdUsuario()){
        $this->visao('inicial/mostrar.php', [
            'anotacao' => $anotacao
        ]);
        }
        else{
        $this->redirecionar(URL_RAIZ . 'notes/minhas');
        }
    }

    public function atualizar($id)
    {
        $contato = Nota::buscarId($id);
        $contato->setTitulo($_POST['titulo']);
        $contato->setTexto($_POST['texto']);
        $contato->salvar();
        $this->redirecionar(URL_RAIZ . 'notes/minhas');
    }

}
