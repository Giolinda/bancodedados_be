<?php

	class Os {
		var $num_os;
		var $id_prest;
		var $id_obra;
		var $dataInicial;
		var $dataFinal;
		var $Total_horas;

		function getNum_os(){
			return $this->num_os;
		}
		function setNum_os($num_os){
			$this->num_os = $num_os;
		}

		function getId_prest(){
			return $this->id_prest;
		}
		function setId_prest($id_prest){
			$this->id_prest = $id_prest;
		}

		function getId_obra(){
			return $this->id_obra;
		}
		function setId_obra($id_obra){
			$this->id_obra = $id_obra;
		}

		function getDataInicial(){
			return $this->dataInicial;
		}
		function setDataInicial($dataInicial){
			$this->dataInicial = $dataInicial;
		}

		function getDataFinal(){
			return $this->dataFinal;
		}
		function setDataFinal($dataFinal){
			$this->dataFinal = $dataFinal;
		}

		function getTotal_horas(){
			return $this->Total_horas;
		}
		function setTotal_horas($Total_horas){
			$this->Total_horas = $Total_horas;
		}
	}

	class OsDAO {
		function create($os) {
			$result = array();

			try {
				$query = "INSERT INTO os VALUES ('$num_os', '$id_prest', '$id_obra', '$dataInicial', '$dataFinal', '$totalHoras')";S

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
				$query = "SELECT * FROM os"; 

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$os = new Os();
					$os->setNum_os($row->num_os);
					$os->setId_prest($row->id_prest);
					$os->setId_obra($row->id_obra);
					$os->setDataInicial($row->datainicial);
					$os->setDataFinal($row->datafinal);
					$os->setValorHora($row->valorhora);
					$result[] = $os;


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
				$query = "UPDATE os";

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
				$query = "DELETE FROM os;

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
