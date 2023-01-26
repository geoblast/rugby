<?php
	include_once 'src/connectionString.app.php';
	include_once 'src/configuration.app.php';
	include_once 'src/links.app.php';
	include_once 'src/game.app.php';
	include_once 'src/classification.app.php';

	$appData = getAppConfiguration();
	$appLinks = getAppLinks();
	$appLastGame = getAppLastGame();
	$appNextGame = getAppNextGame();
	$appClassificationTable = getAppClassificationTable();

	// echo '<br/>appNextGame<br/><pre>';
	// print_r($appNextGame);
	// echo '</pre><br/>';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $appData['seo_title'] ?></title>
	<link rel="icon" type="image/x-icon" href="/images/system/team.ico">
	<link rel="stylesheet" href="css/drc.min.css">
</head>
<body>
	<div class="drc-menu">
		<div class="wrapper">
			<input type="checkbox" id="menuToggler" />
			<div class="menu">
				<div class="company">
					<div class="logo">
						<img src="/images/layout/logo.webp" alt="Douro Rugby Club" />
					</div>
					<div class="title"><?php echo $appData['title'] ?></div>
				</div>
				<div class="hamburguer">
					<label for="menuToggler"></label>
				</div>
			</div>
			
			<div class="links">
				<?php
					foreach ($appLinks as $value) {
				?>
						<a href="<?php echo $value['url'] ?>"><?php echo $value['label'] ?></a>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<div class="drc-hero">
		<div class="wrapper">
			<h2><?php echo $appData['hero_subtitle'] ?></h2>
			<h1><?php echo $appData['hero_title'] ?></h1>
		</div>
	</div>
	<div class="drc-results-table">
		<div class="wrapper" style="--colorHome: <?php echo $appLastGame['home_team_color'] ?>; --colorVisitor: <?php echo $appLastGame['visitor_team_color'] ?>;">
			<div class="team">
				<div class="logo">
					<img src="/images/teams/<?php echo $appLastGame['home_team_logo'] ?>" />
				</div>
				<div class="name">
					<?php echo $appLastGame['home_team'] ?>
				</div>
			</div>
			<div class="team">
				<div class="logo">
					<img src="/images/teams/<?php echo $appLastGame['visitor_team_logo'] ?>" />
				</div>
				<div class="name">
					<?php echo $appLastGame['visitor_team'] ?>
				</div>
			</div>
			<div class="result-wrapper">
				<div class="result">
					<?php echo $appLastGame['home_team_score'] ?> - <?php echo $appLastGame['visitor_team_score'] ?>
				</div>
			</div>
		</div>
	</div>
	<div class="drc-classification-table">
		<div class="wrapper">
			<div class="cell">
				<div class="header">Próximo Jogo</div>
				<div class="body next-game">
					<div class="present-game">
						<div class="pg-cell">
							<div class="logo">
								<img src="/images/teams/<?php echo $appNextGame['home_team_logo'] ?>" />
							</div>
							<div class="name">
								<?php echo $appNextGame['home_team'] ?>
							</div>
						</div>
						<div class="pg-cell small">
							<div class="badge">vs</div>
						</div>
						<div class="pg-cell">
							<div class="logo">
								<img src="/images/teams/<?php echo $appNextGame['visitor_team_logo'] ?>" />
							</div>
							<div class="name">
								<?php echo $appNextGame['visitor_team'] ?>
							</div>
						</div>
					</div>
					<div class="info-game">
						<div class="highlight"><?php echo $appNextGame['championship'] ?></div>
						<div><?php echo $appNextGame['game_day'] ?></div>
						<div><?php echo $appNextGame['game_hour'] ?></div>
						<div class="highlight"><?php echo $appNextGame['place'] ?></div>
					</div>
					<div>
						<div>
							<span id="counterDays">xx</span>
							<span>Dias</span>
						</div>
						<div>
						<span id="counterHours">xx</span>
							<span>Horas</span>
						</div>
						<div>
						<span id="counterMinuts">xx</span>
							<span>Minutos</span>
						</div>
						<div>
						<span id="counterSeconds">xx</span>
							<span>Segundos</span>
						</div>
					</div>
				</div>
			</div>
			<div class="cell">
				<div class="header">header</div>
				<div class="body classification">
					<?php
						foreach ($appClassificationTable as $key => $value) {
					?>
						<div>
							<div><?php echo ($key + 1) ?></div>
							<div><?php echo $value['logo'] ?></div>
							<div><?php echo $value['name'] ?></div>
							<div><?php echo $value['won'] ?></div>
							<div><?php echo $value['draw'] ?></div>
							<div><?php echo $value['loss'] ?></div>
							<div><?php echo $value['points'] ?></div>
						</div>
					<?php
						}
					?>					
				</div>
			</div>
		</div>
	</div>
	<div>videos</div>
	<div>Footer</div>

	<script>
		const pageObj = {
			hasCounter: true,
			counterLimitDate: '<?php echo $appNextGame['game_day'] ?> <?php echo $appNextGame['game_hour'] ?>'
		}
	</script>

	<script src="js/drc.js"></script>
</body>
</html>