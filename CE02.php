<!DOCTYPE html>

<!-- Jamie Lam, age 28 -->

<html lang="en">
<head>
  <title>CE01 Hello World</title>
  <meta charset = "utf-8">
  <meta name = "viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>

    <?php
      $d = date("D");
      if ($d == "Fri") {
        echo "Have a nice weekend";
    } elseif ($d == "Wed") {
        echo "Have a nice Wednesday!";
    } else {
        echo "Have a nice day!";
    }
        echo "Today is ".$d."<br>";
        echo $message;
    ?>

</body>
</html>