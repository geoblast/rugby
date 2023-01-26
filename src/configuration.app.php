<?php
	function getAppConfiguration() {
		$result = [];
		try {
			$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=". DB_CHARSET, DB_USER, DB_PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultSet = $conn->query("SELECT * FROM configuration")->fetchAll(PDO::FETCH_ASSOC);

			foreach ($resultSet as $value) {
				$result[$value['prop_name']] = $value['prop_value'];
			}
	
			return $result;
	
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
?>