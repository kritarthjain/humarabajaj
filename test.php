<?php
    $db = mysqli_connect('127.0.0.1','root','password','bolguru');
    // Check connection
    if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error() . '<br/>';
    }
?>
<html>
    <body>
          HELLO WORLD! <p>

          <?php

                function outputDefinition($defRow) {
                    echo $defRow['word'];
                    echo ': ';
                    echo $defRow['definition'];
                    echo '<br/>';
                }

                $query = "SELECT * FROM `simpletable`;";
                $result = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($result)) {
                      // Display your datas on the page
                      outputDefinition($row);
                }
              echo "HI THERE <br/>";
          ?>
    </body>
</html>
