!DOCTYPE html>
<html>
  <head>
    <title>Password Generator</title>
  </head>


  <body>

    <h1>Password Generator</h1>
    <p>Generate a password!</p>

   <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $arg3 = $arg4 = $output = $retc = "";
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);

        if(isset($_POST["arg2"])){
        $arg2 = 1;
        }else{
        $arg2 = 0;
        }

        if(isset($_POST["arg3"])){
        $arg3 = 1;
        }else{
        $arg3 = 0;
        }

        if(isset($_POST["arg4"])){
        $arg4 = 1;
        }else{
        $arg4 = 0;
        }

         exec("/usr/lib/cgi-bin/sp2a/passgen " . $arg1 . " " . $arg2 . " " . $arg3 . " " . $arg4, $output, $retc);
       }
       }
       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Length: <input type="text" name="arg1"><br>
      Uppercase: <input type="checkbox" name="arg2" value="uppercase"><br>
      Numbers: <input type="checkbox" name="arg3" value="number"><br>
      Special: <input type="checkbox" name="arg4" value="special"><br>
<br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
       echo "<h2>Your Input:</h2>";
         echo $arg1;
         echo "<br>";
         echo $arg2;
         echo "<br>";
       
         echo "<h2>Your Password: </h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }
       
         echo "<h2>Program Return Code:</h2>";
         echo $retc;
       }
    ?>
    
  </body>
</html>
