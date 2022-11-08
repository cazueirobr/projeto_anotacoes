<?php 
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;


class Nota extends Modelo
{
    const BUSCAR_TODOS = 'SELECT id_anotacao, titulo, mensagem FROM anotacoes ORDER BY titulo';
    const PESQUISAR = "SELECT id_anotacao, titulo, mensagem FROM `anotacoes` WHERE titulo LIKE ?";
    const MINHAS_ANOTACOES = "SELECT id_anotacao, titulo, mensagem FROM anotacoes WHERE id_usuario = ?";

    private $titulo;
    private $texto;
    private $id;

    public function __construct($titulo, $texto, $id = null){
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->id = $id;
    }

    public function getId(){
        return $this->$id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getTexto(){
        return $this->texto;
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach($registros as $registro){
            $objetos[] = new Nota($registro['titulo'],$registro['mensagem'],$registro['id_anotacao']);
        }
 
        return $objetos;
    }

    public static function pesquisar($pesquisa){
        $comando = DW3BancoDeDados::prepare(self::PESQUISAR);
        $comando->bindValue(1, $pesquisa, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetch();
        var_dump($registros);
        $objetos = [];
        foreach($registros as $registro){
            $teste = new Nota($registro['titulo'],$registro['mensagem'],$registro['id_anotacao']);
        }
 
        return $objetos;
        
    }

    public static function minhasAnotacoes($id)
    {
        $registros = DW3BancoDeDados::prepare(self::MINHAS_ANOTACOES);
        $registros->bindValue(1, $id, PDO::PARAM_STR);
        $registros->execute();
        $objetos = [];
        foreach($registros as $registro){
            $objetos[] = new Nota($registro['titulo'],$registro['mensagem'],$registro['id_anotacao']);
        }
 
        return $objetos;
    }


}   

?>