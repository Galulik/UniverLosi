<?php
 include "config.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Universität</title>
  <style>
   body {
    background: #FFEBCD url(images/bg-right.png) repeat-y 100% 0;
   }
  </style>
</head>

<body>
  <table>
      <td>
        <style>
        .b1 {
        background: lightseagreen;
        color: black;
        font-size: 10pt;
        }
        </style>
        <th>
          <form method="post">
            <input type="submit" class="b1" name="create11" value="1:1 Beziehung">
          </form>
        </th>
        <th>
          <form method="post">
            <input type="submit" class="b1" name="create1M" value="1:M Beziehung">
          </form>
        </th>
        <th>
          <form method="post">
            <input type="submit" class="b1" name="createNM" value="N:M Beziehung">
          </form>
        </th>
      </td>
    </table>

<?php
    if($_POST["create11"])
    {
      $module = mysqli_query($connection, "SELECT * FROM `modul`");
      $pruefungen = mysqli_query($connection, "SELECT * FROM `pruefung`");
?><br>Module:<br><?php
      while($modul = mysqli_fetch_assoc($module)){
    ?>
      <?php echo $modul['id'] . ". ";?>
Bezeichnung:
      <?php echo $modul['bezeichnung'];?><br>

      <?php
      while($pru = mysqli_fetch_assoc($pruefungen)){
                         $pruef[] = $pru;
                       }

                                foreach ($pruef as $pu) {
                                  if($modul['pruefungId'] == $pu['id']){

                                      echo "Klausur: " . $pu['bezeichnung']; ?><br><?php
                                      break;
                                  }
                              ?>
                                <?php
                              }
      }
    }
        ?> 
        <?php
          if($_POST["create1M"])
          {
            $studenten = mysqli_query($connection, "SELECT * FROM `student`");
            $module = mysqli_query($connection, "SELECT * FROM `modul`");
            $noten = mysqli_query($connection, "SELECT * FROM `note`");
        ?><br>Studenten:<br><?php
            while($student = mysqli_fetch_assoc($studenten)){
          ?>


            <?php echo $student['id'] . ". ";?>
        Student:
            <?php echo $student['name'];?><br>

            <?php
            while($not = mysqli_fetch_assoc($noten)){
                               $note[] = $not;
                             }
                              while($mod = mysqli_fetch_assoc($module)){
                               $modul[] = $mod;
                             }

                                      foreach ($note as $no) {
                                        if($student['id'] == $no['studentId']){
                                          foreach ($modul as $mo) {
                                        if($no['modulId'] == $mo['id']){
                                            echo "Modul: " . $mo['bezeichnung'] . ": " . $no['note'] . " ";
                                            
                                            ?><br><?php
                                        }
                                      }
                                          

                                        }


                                    ?>

                                      <?php
                                    }

            }

          }

              ?>

              <?php
                if($_POST["createNM"])
                {
                  $lehrern = mysqli_query($connection, "SELECT * FROM `lehrer`");
                  $module = mysqli_query($connection, "SELECT * FROM `modul`");
                  $lehrerModul = mysqli_query($connection, "SELECT * FROM `lehrerModul`");
              ?><br>Lehrern:<br><?php
                  while($lehrer = mysqli_fetch_assoc($lehrern)){
                ?>
                  <?php echo $lehrer['id'] . ". ";?>
              Lehrer:
                  <?php echo $lehrer['name'];?><br>

                  <?php
                  while($mod = mysqli_fetch_assoc($module)){
                                     $modulen[] = $mod;
                   }
                  while($lem = mysqli_fetch_assoc($lehrerModul)){
                                      $LehrMod[] = $lem;
                    }

                echo "Module: ";
                    foreach ($LehrMod as $lm) {
                          if($lehrer['id'] == $lm['lehrerId']){
                            foreach ($modulen as $mo){
                              if($mo['id']==$lm['modulId']){
                                echo $mo['bezeichnung'] . " | ";
                                ?><?php
                              }
                            }

                          }

                                          }
                                          ?> <br> <?php

                  }
                
                  ?> <br> <br>

<?php
               
                  $lehrern = mysqli_query($connection, "SELECT * FROM `lehrer`");
                  $module = mysqli_query($connection, "SELECT * FROM `modul`");
                  $lehrerModul = mysqli_query($connection, "SELECT * FROM `lehrerModul`");
              ?><br>Module:<br><?php
                  while($mod = mysqli_fetch_assoc($module)){
                ?>
                  <?php echo $mod['id'] . ". ";?>
              Modul:
                  <?php echo $mod['bezeichnung'];?><br>

                  <?php
                  while($ler = mysqli_fetch_assoc($lehrern)){
                                     $lehrerne[] = $ler;
                   }
                  while($lem = mysqli_fetch_assoc($lehrerModul)){
                                      $LehrMod[] = $lem;
                    }

                echo "Lehrern: ";
                    foreach ($LehrMod as $lm) {
                          if($mod['id'] == $lm['modulId']){
                            foreach ($lehrerne as $le){
                              if($le['id']==$lm['lehrerId']){
                                echo $le['name'] . " | ";
                                ?><?php
                              }
                            }

                          }

                                          }
                                          ?> <br> <?php

                  }
         }
                  ?>




</body>

</html>