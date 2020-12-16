<?php

	class Prestadores {
		var $id_prest;
		var $nome;
		var $telefone;
		var $funcoes;
		var $valorHora;

		function getId_prest(){
			return $this->id_prest;
		}
		function setId_prest($id_prest){
			$this->id_prest = $id_prest;
		}

		function getNome(){
			return $this->nome;
		}
		function setNome($nome){
			$this->nome = $nome;
		}

		function getTelefone(){
			return $this->telefone;
		}
		function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		function getFuncoes(){
			return $this->funcoes;
		}
		function setFuncoes($funcoes){
			$this->funcoes = $funcoes;
		}

		function getValorHora(){
			return $this->valorHora;
		}
		function setValorHora($valorHora){
			$this->valorHora = $valorHora;
		}
	}

	class PrestadoresDAO {
		function create($prestadores) {
			$result = array();
			$nome = $prestadores->getNome();
			$telefone = $prestadores->getTelefone();			
			$funcoes = $prestadores->getFuncoes();
			$valorHora = $prestadores->getValorHora();

			try {
				$query = "INSERT INTO prestadores VALUES (default, '$nome', '$telefone', '$funcoes', '$valorHora')";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$prestadores->setId_prest(Connection::getInstance()->lastInsertId());
					$result[] = $prestadores;

				}else {
					$result["err"] = "falha ao inserir";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function readAll() {
			$result = array();

			try {
				$query = "SELECT * from prestadores";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$prestador = new Prestadores();
					$prestador->setId_prest($row->id_prest);
					$prestador->setNome(utf8_encode ($row->nome));
					$prestador->setTelefone($row->telefone);
					$prestador->setFuncoes($row->funcoes);
					$result[] = $prestador;
				}
				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function read() {
			$result = array();

			try {
				$query = "SELECT prestadores FROM prestadores WHERE condition";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function update($prestadores) {
			$result = array();
			$id = $prestadores->getId_prest();
			$nome = $prestadores->getNome();
			$telefone = $prestadores->getTelefone();			
			$funcoes = $prestadores->getFuncoes();
			$valorHora = $prestadores->getValorHora();
			try {
				$query = "UPDATE prestadores SET  nome = $nome, telefone = $telefone, funcoes =$funcoes, valorHora = $valorHora WHERE id_prest = $id";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
					$result = $prestadores;
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete($id_prest) {
			$result = array();


			try {
				$query = "DELETE FROM prestadores WHERE id_prest= $id_prest";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["msg"] ="ID $id_prest apagado com sucesso!";
				}else
				$result["err"] = "Erro ao apagar o ID $id_prest!";

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}
