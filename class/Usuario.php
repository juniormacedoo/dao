<?php

class Usuario {
	private $idusuario;
	private $login;
	private $senha;
	private $datacadastro;
	
	public function getIdusuario(){
		return $this->idusuario;
	}
	
	public function setIdusuario($value){
		$this->idusuario = $value;
	}
	
	public function getLogin(){
		return $this->login;
	}
	
	public function setLogin($value){
		$this->login = $value;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($value){
		$this->senha = $value;
	}
	
	public function getDatacadastro(){
		return $this->datacadastro;
	}
	
	public function setDatacadastro($value){
		$this->datacadastro = $value;
	}
	
	public function loadById($id){
		$sql = new Sql();
		
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(
			":id"=>$id
		));
		
		if(count($results) > 0){
			$row = $results[0];
			
			$this->setIdusuario($row['idusuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDatacadastro(new DateTime($row['datacadastro']));
		}
	}
	
	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"datacadastro"=>$this->getDatacadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>