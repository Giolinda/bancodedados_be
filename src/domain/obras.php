<?php

	class Obras {
		var $id_obra;
		var $descricao;
		var $duracao_prevista_horas;

		function getId_obra(){
			return $this->id_obra;
		}
		function setId_obra($id_obra){
			$this->id_obra = $id_obra;
		}

		function getDescricao(){
			return $this->descricao;
		}
		function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		function getDuracao_prevista_horas(){
			return $this->duracao_prevista_horas;
		}
		function setDuracao_prevista_horas($duracao_prevista_horas){
			$this->duracao_prevista_horas = $duracao_prevista_horas;
		}
	}

	class ObrasDAO {
		function create($obras) {
			$result = array();
			$id_obra = $obras->getId_obra();
			$descricao = $obras->getDescricao();			
			$duracao_prevista_horas = $obras->getDuracao_prevista_horas();
		    $valorHora = $prestadores->getValorHora();
		 	$result[]= $obras;

			try {
				$query = "INSERT INTO obras VALUES (default, "$id_obra", "$descricao", "$duracao_prevista_horas")";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
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
				$query = "SELECT * FROM obras WHERE condition";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$obras->setId_obra($row->id_obras);
					$obras->setDescricao($row->descrição);
					$obras->setDuracao_prevista_horas($row->duracao_prevista_horas);
					$result[] = $obras;
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function update() {
			$result = array();

			try {
				$query = "UPDATE obras SET obras WHERE id_obras";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete() {
			$result = array();

			try {
				$query = "DELETE FROM obras WHERE id_obras";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}
