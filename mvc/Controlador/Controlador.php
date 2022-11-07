<?php
namespace Controlador;
use \Modelo\Conta;
use \Framework\DW3Controlador;
use \Framework\DW3Sessao;

abstract class Controlador extends DW3Controlador
{
    protected $usuario;

	protected function verificarLogado()
    {
    	$usuario = $this->getUsuario();
        if ($usuario == null) {
        	$this->redirecionar(URL_RAIZ . 'logar');
        }
    }

    protected function getUsuario()
    {
        if ($this->usuario == null) {
        	$usuarioId = DW3Sessao::get('usuario');
        	if ($usuarioId == null) {
        		return null;
        	}
        	$this->usuario = Conta::buscarId($usuarioId);
        }
        return $this->usuario;
    }
}
