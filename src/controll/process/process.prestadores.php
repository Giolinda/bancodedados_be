<?php

	require("../../domain/connection.php");
	require("../../domain/Prestadores.php");

	class PrestadoresProcess {
		var $pd;


		function doGet($arr){
			$pd = new PrestadoresDAO();
			$sucess = $pd->readAll();
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$pd = new PrestadoresDAO();
			$prestadores = new Prestadores();
			$prestadores->setNome($arr["nome"]);
			$prestadores->setTelefone($arr["telefone"]);
			$prestadores->setFuncoes($arr["funcoes"]);
			$prestadores->setValorHora($arr["valorHora"]);
			$sucess = $pd->create($prestadores);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$pd = new PrestadoresDAO();
			$prestadores->setId_prest($arr["id_prest"]);
			$prestadores->setNome($arr["nome"]);
			$prestadores->setTelefone($arr["telefone"]);
			$prestadores->setFuncoes($arr["funcoes"]);
			$prestadores->setValorHora($arr["valorHora"]);
			$sucess = $pd->update($prestadores);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$pd = new PrestadoresDAO();
			$sucess = $pd->delete($arr["id_prest"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}