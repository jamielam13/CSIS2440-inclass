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

    if($_POST) {
        if($_POST['requestTypeCreate']){
            $sql = "INSERT INTO MONSTERS(MonsterName, MonsterAC, HitDice, MonsterAttack, MonsterDamage, MonsterMove, MonsterTreasure, MonsterXP, Active"
                    VALUES('$');
        }
    }
    
	$newMob = array(
        array("Giant Ant", 17, 4, 1, "2d6", 60, "U", 240),
        array("Ape", 14, 4, 2, "1d4", 40, "N", 240),
        array("Assassin Vine", 15, 6, 1, "1d8", 5, "U", 500),
        array("Basilisk", 16, 6, 2,"1d10", 20, "F", 610),
        array("Dire Bear", 15, 7, 3, "2d8", 40, "N", 670),
        array("Fire Beetle", 16, 2,1, "2d4", 40, "N", 25),
        array("Blink Dog", 15, 4, 1, "1d6", 40, "C", 280),
        array("Dragon", 18, 7, 4, "2d10", 80, "H", 800),
        array("Dryad", 15, 2, 1, "1d4", 40, "D", 100),
        array("Elemental", 18, 8, 1, "1d12", 20, "N", 945),
        array("Gelatinous Cube", 12, 4, 1, "2d4", 20, "V", 280)
        );
        echo "<br><h2>Now Adding</h2><br>";
        foreach ($newMob as $insertArray) {
            $insert = "INSERT INTO `Library`.`Monsters` (`MonsterName`, `MonsterAC`, `HitDice`, `MonsterAttack`, `MonsterDamage`, "
                    . "`MonsterMove`, `MonsterTreasure`, `MonsterXP`, `Active`) VALUES ('$insertArray[0]', $insertArray[1], $insertArray[2],"
                    . " $insertArray[3], '$insertArray[4]', $insertArray[5],'$insertArray[6]',$insertArray[7],'Y')";
            $success = $con->query($insert);
            if ($success == FALSE) {
                $failmess = "Whole query " . $insert . "<br>";
                echo $failmess;
                die('Invalid query: ' . mysqli_error($con));
            } else {
                echo "$insertArray[0] was added<br>";
            }
        }
        
        echo "<br><h2>Now Removing</h2><br>";
        for ($i = 0; $i < sizeof($newMob); $i+=2) {
            
            $update = "UPDATE `Library`.`Monsters` SET `Active`='N' "
                    . "WHERE `MonsterName`='" . $newMob[$i][0] . "'";
            
            $success = $con->query($update);
            
            if ($success == FALSE) {
                $failmess = "Whole query " . $update . "<br>";
                echo $failmess;
                die('Invalid query: ' . mysqli_error($con));
            } else {
                echo $newMob[$i][0]." was removed<br>";
            }
        }
        echo "<br>This is who is left<hr>";
        $search = "SELECT * FROM Library.Monsters where Active = 'Y' Order by MonsterName";
        
        $return = $con->query($search);
        
        if (!$return) {
            $message = "Whole query " . $search;
            echo $message;
            die('Invalid query: ' . mysqli_error($con));
        }
        echo "<table><th>Name</th><th>AC</th><th>Hit Dice</th><th>XP</th>";
        while ($row = $return->fetch_assoc()) {
            echo "<tr><td>Name: " . $row['MonsterName'] 
                    . "</td><td> AC: " . $row['MonsterAC'] 
                    . "</td><td> HD:". $row['HitDice']
                    ." </td><td> XP:".$row['MonsterXP']."</td></tr>";
        }
        echo "</table>";
        
        ?>
</body>
</html>