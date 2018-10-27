<?php                  
                      $id = $_GET['id'];
                      $conn = mysqli_connect('localhost','root','','pacific');
                      $sql3 = mysqli_query($conn,"DELETE from assignments where assignment_id=$id ");
                      echo $sql3;
                      if($sql3){
                          echo "Deleted Value";
                      } else {
                          echo $sql3    ;
                      }
                      ?>