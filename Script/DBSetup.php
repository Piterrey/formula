<?php
$dbName="Formula1";
$con=mysqli_connect("127.0.0.1","root","");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Create database
$sql="DROP DATABASE IF EXISTS ".$dbName;
if (mysqli_query($con,$sql))
  {
  echo "Database ".$dbName." drop successfully <br>";
  }
else
  {
  echo "Error drop database: " . mysqli_error($con);
  }
  
// Create database
$sql="CREATE DATABASE ".$dbName." DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;";
if (mysqli_query($con,$sql))
  {
  echo "Database ".$dbName." created successfully <br>";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
 

$con=mysqli_connect("127.0.0.1","root","",$dbName);


// Create table Traks
$sql="CREATE TABLE Traks
	(
		track_ID INT(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(30) NOT NULL,
		PRIMARY KEY (track_ID)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;";
	
if (mysqli_query($con,$sql))
  {
  echo "Table Teams created successfully <br>";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
  
// Create table Teams
$sql="CREATE TABLE Teams
	(
		team_ID INT(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(30) NOT NULL,
		PRIMARY KEY (team_ID)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;";
	
if (mysqli_query($con,$sql))
  {
  echo "Table Teams created successfully <br>";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }

  
// Create table Pilots
$sql="CREATE TABLE Pilots
	(
		pilot_ID INT(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(30) NOT NULL,
		surname VARCHAR(30) NOT NULL,
		number int(11) NOT NULL,
		team_ID int(11) NOT NULL,
		photo_path VARCHAR(500) DEFAULT NULL,
		PRIMARY KEY (pilot_ID),
		FOREIGN KEY (team_ID) REFERENCES Teams (team_ID) ON UPDATE CASCADE 
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;";

if (mysqli_query($con,$sql))
  {
  echo "Table Pilots created successfully <br>";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
 

// Create table Score
$sql="CREATE TABLE Score
	(
		Score_ID INT(11) NOT NULL AUTO_INCREMENT,
		pilot_ID INT(11) NOT NULL,
		track_ID INT(11) NOT NULL,
		day VARCHAR(10) NOT NULL,
		score INT(11) NOT NULL,
		UNIQUE (score_ID),
		INDEX (track_ID,pilot_ID),
		PRIMARY KEY (pilot_ID,track_ID,day)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;";

if (mysqli_query($con,$sql))
  {
  echo "Table Pilots created successfully <br>";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  } 
  
 //Aggiunta chiavi esterne
 
$sql=	"ALTER TABLE  `score` 
	ADD FOREIGN KEY (  `pilot_ID` ) REFERENCES  `formula1`.`pilots` (`pilot_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD FOREIGN KEY (  `track_ID` ) REFERENCES  `formula1`.`traks` (`track_ID`) ON DELETE RESTRICT ON UPDATE CASCADE ;";

if (mysqli_query($con,$sql))
  {
  echo "Add Foreign key<br>";
  }
else
  {
  echo "Error adding foreign key: " . mysqli_error($con);
  }
?>
