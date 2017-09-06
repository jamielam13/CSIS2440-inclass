<!DOCTYPE html>

<!-- Jamie Lam, age 28 -->

<html lang="en">
<head>
  <title>CE01 Hello World</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>

    <?php
      $d=date("D");
      
      if ($d=="Fri")
      $message ="Have a nice weekend!";
      
      else
      $message ="Have a nice day!";
      echo $message;
    ?>

</body>
</html>