<?php

	require("../../domain/connection.php");
	require("../../domain/Os.php");

	class OsProcess {
		var $od;

		function doGet($arr){
			$od = new OsDAO();
			$sucess = $pd->readAll();
			http_response_code(200);
			echo json_encode($sucess);
		}

		function doPost($arr){
			$od = new OsDAO();
			$os = new Os();
			$os->setNum_Os($arr["num_os"]);
			$os->setId_prest($arr["id_prest"]);
			$os->setId_obra($arr["id_obra"]);
			$os->setDataInicial($arr["dataInicial"]);
			$os->setDataFinal($arr["dataFinal"]);
			$os->setTotalHoras($arr["totalHoras"]);
			$sucess = $pd->create($prestadores);
			http_response_code(200);
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$od = new OsDAO();
			$os = new Os();
			$os->setNum_Os($arr["num_os"]);
			$os->setId_prest($arr["id_prest"]);
			$os->setId_obra($arr["id_obra"]);
			$os->setDataInicial($arr["dataInicial"]);
			$os->setDataFinal($arr["dataFinal"]);
			$os->setTotalHoras($arr["totalHoras"]);
			$sucess = $pd->update($prestadores);
		
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$od = new OsDAO();
			$sucess = $os->delete($arr["num_os"])
			http_response_code(200);
			echo json_encode($sucess);
		}
	}