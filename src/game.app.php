<?php
	function getAppLastGame() {
		try {
			$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=". DB_CHARSET, DB_USER, DB_PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultSet = $conn->query("select t1.name as 'home_team', t1.logo as 'home_team_logo', t1.team_color as 'home_team_color',
			t2.name as 'visitor_team', t2.logo as 'visitor_team_logo', t2.team_color as 'visitor_team_color',
			g.home_team_score, g.visitor_team_score 
			from games g 
			join teams t1 on g.id_home_team = t1.id
			join teams t2 on g.id_visitor_team = t2.id
			join championships c on g.id_championship = c.id
			where g.home_team_score is not null order by g.game_day desc, g.game_hour desc
			limit 1;")->fetchAll(PDO::FETCH_ASSOC);
			return $resultSet[0];
	
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}

	function getAppNextGame() {
		try {
			$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=". DB_CHARSET, DB_USER, DB_PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultSet = $conn->query("select t1.name as 'home_team', t1.logo as 'home_team_logo',
			t2.name as 'visitor_team', t2.logo as 'visitor_team_logo',
			c.name as 'championship',
			g.game_day, g.game_hour, g.place  
			from games g 
			join teams t1 on g.id_home_team = t1.id
			join teams t2 on g.id_visitor_team = t2.id
			join championships c on g.id_championship = c.id
			where g.home_team_score is null order by g.game_day desc, g.game_hour desc
			limit 1;")->fetchAll(PDO::FETCH_ASSOC);
			return $resultSet[0];
	
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
?>