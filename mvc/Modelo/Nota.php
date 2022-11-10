<?php 
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;


class Nota extends Modelo
{
    const BUSCAR_TODOS = 'SELECT id_anotacao, titulo, mensagem FROM anotacoes ORDER BY titulo';
    const PESQUISAR = "SELECT * FROM anotacoes WHERE titulo = ?";
    const MINHAS_ANOTACOES = "SELECT * FROM anotacoes WHERE id_usuario = ?";
    const INSERIR = "INSERT INTO anotacoes(titulo, mensagem, id_usuario) VALUES (?, ?, ?)";
    const BUSCAR_ID = "SELECT * FROM anotacoes WHERE id_anotacao = ?";
    const ATUALIZAR = "UPDATE anotacoes SET titulo = ?, mensagem = ? WHERE id_anotacao = ?";

    private $titulo;
    private $texto;
    private $id;
    private $id_usuario;

    public function __construct($titulo, $texto,$id_usuario = null, $id = null){
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->id = $id;
        $this->id_usuario = $id_usuario;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function getIdUsuario(){
        return $this->id_usuario;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
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

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Nota(
            $registro['titulo'],
                $registro['mensagem'],
            $registro['id_usuario'],
            $registro['id_anotacao']
        );
    }

    public static function pesquisar($pesquisa){
        $comando = DW3BancoDeDados::prepare(self::PESQUISAR);
        $comando->bindValue(1, $pesquisa, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetch();
        var_dump($registros);
        $objetos = [];
        foreach($registros as $registro){
            $objetos[] = new Nota($registro['titulo'],$registro['mensagem'],$registro['id_usuario'],$registro['id_anotacao']);
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
            $objetos[] = new Nota($registro['titulo'],$registro['mensagem'],$registro['id_usuario'],$registro['id_anotacao']);
        }
 
        return $objetos;
    }

    public function salvar()
    {
        if ($this->id == null) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->texto, PDO::PARAM_STR);
        $comando->bindValue(3, $this->id_usuario, PDO::PARAM_INT);

        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->titulo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->texto, PDO::PARAM_STR);
        $comando->bindValue(3, $this->id, PDO::PARAM_INT);
        $comando->execute();
    }



}   

?>