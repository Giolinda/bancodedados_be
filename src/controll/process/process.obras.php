<?php

	require("../../domain/connection.php");
	require("../../domain/Obras.php");

	class ObrasProcess {
		var $od;

		function doGet($arr){
			$od = new ObrasDAO();
			$sucess = $pd->readAll();
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$od = new ObrasDAO();
			$obras = new Obras();
			$obras->setId_Obra($arr["id_obra"]);
			$obras->setDescricao($arr["descrição"]);
			$obras->setDuracao_Prevista_Horas($arr["duracao_prevista_horas"]);
			$sucess = $od->create($obras);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$od = new ObrasDAO();
			$obras = new Obras();
			$obras->setId_Obra($arr["id_obra"]);
			$obras->setDescricao($arr["descrição"]);
			$obras->setDuracao_Prevista_Horas($arr["duracao_prevista_horas"]);
			$sucess = $od->update($obras);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$od = new ObrasDAO();
			$sucess = $od->delete($arr["id_obra"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}