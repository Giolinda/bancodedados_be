<?php

	require("../process/process.obras.php");

	include("configs.php");

	$op = new ObrasProcess();

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