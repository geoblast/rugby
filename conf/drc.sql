-- create database (run only once)

CREATE DATABASE drc;

-- Tabela das configurações

drop table configuration;

create table configuration (
	id MEDIUMINT NOT NULL primary key AUTO_INCREMENT,
	prop_name varchar(30),
	prop_value varchar(30)
);


INSERT INTO configuration (prop_name, prop_value) VALUES('title', 'Douro Rugby Clube');
INSERT INTO configuration (prop_name, prop_value) VALUES('seo_title', 'Douro Rugby Clube');
INSERT INTO configuration (prop_name, prop_value) VALUES('hero_title', 'O Clube de rugby de gaia');
INSERT INTO configuration (prop_name, prop_value) VALUES('hero_subtitle', 'Douro<br/>Rugby Clube');


-- alterar uma propriedade

update configuration set prop_value = 'Site Douro Rugby Club' where id=2;


-- Tabela dos links

drop table links;

create table links (
	id MEDIUMINT NOT NULL primary key AUTO_INCREMENT,
	label varchar(30),
	url varchar(50),
	active char default 'S',
	link_order int
);

INSERT INTO links (label, url, link_order) VALUES('Sobre', '/',1);
INSERT INTO links (label, url, link_order) VALUES('Jogos', '/',2);
INSERT INTO links (label, url, link_order) VALUES('Jogadores', '/',3);
INSERT INTO links (label, url, link_order) VALUES('Loja', '/',4);
INSERT INTO links (label, url, link_order) VALUES('Contactos', '/',5);

select label, url from links where active ='S' order by link_order asc;

-- Tabela da equipas

drop table teams;

create table teams (
	id MEDIUMINT NOT NULL primary key AUTO_INCREMENT,
	name varchar(50),
	logo varchar(50),
	team_color varchar(7),
	city varchar(50),
	address varchar(50),
	phone varchar(9),
	email varchar(60)
);

select * from teams t;

-- tabela de campeonatos

drop table championships;

create table championships (
	id MEDIUMINT NOT NULL primary key AUTO_INCREMENT,
	name varchar(20)
);

INSERT INTO championships (name) VALUES('CN Honra');
INSERT INTO championships (name) VALUES('CN1');
INSERT INTO championships (name) VALUES('CN2');
INSERT INTO championships (name) VALUES('Taça de Portugal');
INSERT INTO championships (name) VALUES('Amigável');


select * from championships c ;

-- tabela de jogos

drop table games;

create table games (
	id MEDIUMINT NOT NULL primary key AUTO_INCREMENT,
	id_home_team int,
	id_visitor_team int,
	id_championship int,
	game_day date,
	game_hour time,
	place varchar(50),
	home_team_score int,
	visitor_team_score int
);


INSERT INTO drc.games (id_home_team, id_visitor_team, id_championship, game_day, game_hour, place, home_team_score, visitor_team_score) VALUES(1, 2, 3, '2023-01-20', '14:00', 'Perosinho', NULL, NULL);

	-- query para ir buscar o último resultado
	select t1.name as 'home_team', t1.logo as 'home_team_logo', t1.team_color as 'home_team_color',
	t2.name as 'visitor_team', t2.logo as 'visitor_team_logo', t2.team_color as 'visitor_team_color',
	g.home_team_score, g.visitor_team_score 
	from games g 
	join teams t1 on g.id_home_team = t1.id
	join teams t2 on g.id_visitor_team = t2.id
	join championships c on g.id_championship = c.id
	where g.home_team_score is not null order by g.game_day desc, g.game_hour desc
	limit 1;

	-- query para ir buscar o próximo jogo
	select t1.name as 'home_team', t1.logo as 'home_team_logo',
	t2.name as 'visitor_team', t2.logo as 'visitor_team_logo',
	c.name as 'championship',
	g.game_day, g.game_hour, g.place  
	from games g 
	join teams t1 on g.id_home_team = t1.id
	join teams t2 on g.id_visitor_team = t2.id
	join championships c on g.id_championship = c.id
	where g.home_team_score is null order by g.game_day desc, g.game_hour desc
	limit 1;

-- tabela de classificação

drop table classification;

create table classification (
	id MEDIUMINT NOT NULL primary key AUTO_INCREMENT,
	id_team int,
	won int,
	draw int,
	loss int,
	points int
);

	-- lista de classificação ordenada
	select t.name, t.logo, c.won, c.draw, c.loss,c.points
	from classification c
	join teams t on c.id_team = t.id
	order by c.points desc;