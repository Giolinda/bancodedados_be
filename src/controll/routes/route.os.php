<?php

	require("../process/process.os.php");

	include("configs.php");

	$op = new OsProcess();

	switch($_SERVER['REQUEST_METHOD']) {
		case "GET":
			$op->doGet($_GET);
			break;

		case "POST":
			$op->doPost($_POST);
			break;

		case "PUT":
			$op->doPut($_PUT);
			break;

		case "DELETE":
			$op->doDelete($_DELETE);
			break;
	}