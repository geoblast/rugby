<?php
	function getAppClassificationTable() {
		try {
			$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=". DB_CHARSET, DB_USER, DB_PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultSet = $conn->query("select t.name, t.logo, c.won, c.draw, c.loss,c.points
			from classification c
			join teams t on c.id_team = t.id
			order by c.points desc;")->fetchAll(PDO::FETCH_ASSOC);
			return $resultSet;
	
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
?>