<!DOCTYPE html>
<!-- Jamie Lam, age, 18-->

<html lang="en">
<head>
	<title>CE06</title>
	<meta name="viewport" content = "width=device-width, initial-scale=1">
</head>
<body>
	<?php
    $host = "host = ec2-174-129-239-0.compute-1.amazonaws.com";
    $port = "port = 5432";
    $dbname = "dbname = de0k3inbih6vep";
    $credentials = "user = cdcewbhberxpae password = 3658359f3ba38b51a561f6bb7d66f648e50d94eccd0de2735d085a9463c277d5";

    $db  = pg_connect("host=ec2-174-129-239-0.compute-1.amazonaws.com port=5432 dbname=de0k3inbih6vep user=cdcewbhberxpae password=3658359f3ba38b51a561f6bb7d66f648e50d94eccd0de2735d085a9463c277d5");

    if (!$db) {
        echo('Could not connect');
    }

    $sql = 'CREATE TABLE MONSTERS (
        ID  SERIAL  PRIMARY KEY,
        MonsterName         TEXT    NOT NULL,
        MonsterAC           INT     NOT NULL,
        HitDice             INT     NOT NULL,
        MonsterAttack       INT     NOT NULL,
        MonsterDamage       TEXT    NOT NULL,
        MonsterMove         INT     NOT NULL,
        MonsterTreasure     TEXT    NOT NULL,
        MonsterXP           INT     NOT NULL,
        Active              TEXT    NOT NULL
    )';
    $monsterTable = true;

    
	?>
</body>
</html>