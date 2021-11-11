   /* The football_stats database has the following tables:

ground, player, referee, team, team_player, fixture, fixture_flayer, goalscorer

*/

DROP TABLE IF EXISTS fullinfo, goalscorer, fixture_player, fixture, team_player, player, team, referee, ground;


/* Define table for ground */
CREATE TABLE ground (
  ground_id INT AUTO_INCREMENT,
  ground_name VARCHAR(75)  NOT NULL,
  ground_address VARCHAR(100) NOT NULL,
  ground_capacity INT,
  PRIMARY KEY (ground_id)
);

/* Define table for referee */
CREATE TABLE referee (
  referee_id INT AUTO_INCREMENT,
  referee_name VARCHAR(30)  NOT NULL,
  PRIMARY KEY (referee_id)
);


/* Define table for team */
CREATE TABLE team (
  team_id INT AUTO_INCREMENT,
  team_name VARCHAR(30)  NOT NULL,
  team_manager VARCHAR(30) NOT NULL,
  team_contact_number CHAR(11) NOT NULL,
  ground_id INT,
  PRIMARY KEY (team_id),
  FOREIGN KEY (ground_id)
	REFERENCES ground (ground_id)
);

 /* Define table for player */
CREATE TABLE player (
  player_id INT AUTO_INCREMENT,
  player_name VARCHAR(30)  NOT NULL,
  player_nationality VARCHAR(30) NOT NULL,
  team_id INT,
  PRIMARY KEY (player_id),
  FOREIGN KEY (team_id)
	REFERENCES team (team_id)
);



/* Define table for team_player */
CREATE TABLE team_player (
  team_id INT NOT NULL,
  player_id INT NOT NULL,
  PRIMARY KEY (team_id, player_id),
  FOREIGN KEY (team_id)
      REFERENCES team (team_id),
  FOREIGN KEY (player_id)
      REFERENCES player (player_id)    
);

/* Define table for fixture */
CREATE TABLE fixture (
  fixture_id INT AUTO_INCREMENT,
  fixture_date INT NOT NULL,
  fixture_time INT NOT NULL,
  home_team_id INT NOT NULL,
  away_team_id INT NOT NULL,
  referee_id INT NOT NULL ,
  PRIMARY KEY (fixture_id),
  FOREIGN KEY (home_team_id)
      REFERENCES team (team_id),
  FOREIGN KEY (away_team_id)
      REFERENCES team (team_id),
  FOREIGN KEY (referee_id)
      REFERENCES referee (referee_id)        
);

/* Define table for fixture_player */
CREATE TABLE fixture_player (
  fixture_id INT NOT NULL,
  player_id INT NOT NULL,
  team_id INT NOT NULL,
  PRIMARY KEY (fixture_id, player_id, team_id),
  FOREIGN KEY (fixture_id)
      REFERENCES fixture (fixture_id),
  FOREIGN KEY (player_id, team_id)
      REFERENCES team_player (player_id, team_id)    
);

/* Define table for goalscorer */
CREATE TABLE goalscorer (
  fixture_id INT NOT NULL,
  player_id INT NOT NULL,
  team_id INT NOT NULL,
  FOREIGN KEY (fixture_id, player_id, team_id)
      REFERENCES fixture_player (fixture_id, player_id, team_id)
);
 CREATE TABLE fullinfo (
  fullinfo_id INT AUTO_INCREMENT,
  ground_id INT,
  team_id INT,
  player_id INT,
  PRIMARY KEY (fullinfo_id),
  FOREIGN KEY (ground_id)
	REFERENCES ground (ground_id),
  FOREIGN KEY (team_id)
	REFERENCES team (team_id),
  FOREIGN KEY (player_id)
	REFERENCES player (player_id)
);

