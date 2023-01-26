<?php
	function getAppLinks() {
		try {
			$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=". DB_CHARSET, DB_USER, DB_PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultSet = $conn->query("select label, url from links where active ='S' order by link_order asc")->fetchAll(PDO::FETCH_ASSOC);
			return $resultSet;
	
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
?>