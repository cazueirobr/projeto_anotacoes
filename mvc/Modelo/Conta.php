<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Conta extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM usuarios ORDER BY usuario';
    const BUSCAR_ID = 'SELECT * FROM usuarios WHERE id_usuario = ?';
    const BUSCAR_EMAIL = 'SELECT * FROM usuarios WHERE email = ?';
    const INSERIR = 'INSERT INTO usuarios(usuario, email, senha) VALUES (?, ?, ?)';
    const ATUALIZAR_SENHA = 'UPDATE usuarios SET usuario = ?, email = ?, senha = ? WHERE id_usuario = ?';
    const ATUALIZAR = 'UPDATE usuarios SET usuario = ?, email = ? WHERE id_usuario = ?';
    const DELETAR = 'DELETE FROM usuarios WHERE id_usuario = ?';
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $senhaPlana;


    public function __construct(
        $nome = null,
        $email = null,
        $senhaPlana = null,
        $id = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senhaPlana;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function salvar()
    {
        if ($this->id == null) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    public function verificarSenha($senhaPlana)
    {
        return password_verify($senhaPlana, $this->senha);
    }

    public static function buscarEmail($email)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_EMAIL);
        $comando->bindValue(1, $email, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $usuario = null;
        if ($registro) {
            $usuario = new Conta(
                $registro['usuario'],
                $registro['email'],
                null,
                $registro['id_usuario']
            );
            $usuario->senha = $registro['senha'];
        }
        return $usuario;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Conta(
            $registro['usuario'],
                $registro['email'],
                null,
                $registro['id_usuario']
        );
    }


    public function inserir()
    {
        password_hash($senhaPlana, PASSWORD_BCRYPT);
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->email, PDO::PARAM_STR);
        $comando->bindValue(3, $this->senha, PDO::PARAM_STR);

        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->email, PDO::PARAM_STR);
        $comando->bindValue(3, $this->id, PDO::PARAM_INT);
        $comando->execute();
    }

    public function atualizarComSenha()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR_SENHA);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->email, PDO::PARAM_STR);
        $comando->bindValue(3, $this->senha, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id, PDO::PARAM_INT);
        $comando->execute();
    }


}

