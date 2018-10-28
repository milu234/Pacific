<!DOCTYPE html>
<html>
<head>
  <title>ProjectDashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/projectinfo.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <style type="text/css">
    .modal{
      display: block;
      position: fixed;
      top:20%;
      left:35%;
      background-color: white;
      height: 55%;
      width: 30%;

    }
    #close-btn{
      float:right;
      font-size:40px;
      font-weight: bold;
      cursor: pointer;
    }
    .modal-background{
      position:fixed;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.6);
      z-index: 1;
      top:0;
      left:0;
      display: none;
    }
    #assign_btn{
      float: right;
    }
    #eval-btn{
      float: right;
    }
    a{
      text-decoration:none;
    }
  </style>
</head>

<body id="top">
  <?php
  $active="projects";
   include('../layouts/nav.php') ?>

  <section class="projectinfo">
      <?php
      include 'db.php';
        if (isset($_GET['project_id'])){
          if(isset($_SESSION['err'])){
            echo "<script>alert('".$_SESSION['err']."')</script>";
          }
          
          // first we get the project details
          $query = "SELECT * FROM projects WHERE project_id=".$_GET['project_id'];
          $user = unserialize($_SESSION['user']);
          $id = $user->id;
          $result = mysqli_query($conn, $query);
          $row = null;
          if($result) {
            // there exists a project with the id
            if(mysqli_num_rows($result)>0){
              $row = mysqli_fetch_assoc($result);
            } else{
              header("location:http://localhost:8080/Pacific/index.php");
            }
          }else{
            header("location:http://localhost:8080/Pacific/index.php");
          }
          $query = "SELECT * from works_on where project_id=".$_GET['project_id']." and user_id=".$id;
          $result1 = mysqli_query($conn, $query);
          if(mysqli_num_rows($result1)==0){
            // if the user has not worked on the project
            $_SESSION['err'] = "Invalid project number";
            header("location:http://localhost:8080/Pacific/index.php");
          }
          // query for the team members
          $query = "SELECT email, project_role from users u, works_on w where u.user_id=w.user_id and project_id=".$_GET['project_id'];
          $result2 = mysqli_query($conn, $query);
          if ($result2){
            // if the query executes
            if(mysqli_num_rows($result2) > 0) {
              // if there are team members, there is always going to be atleast one
              $members = "exists";
            }
          }else{
            
          }
          include '../php/includes/utils.php';
          $role_id = getRoleId('student');
          $query = "SELECT user_id, email from users where role_id=".$role_id;
          $result3 = mysqli_query($conn, $query);
          if(mysqli_num_rows($result3)>0){
            $users = "exists";
          } else{
            $users = null;
          }

          //querying the database to get the details of the members of the project
          $query = "SELECT email, u.user_id from users u, works_on w where u.user_id=w.user_id and project_id=".$_GET['project_id'];
          $result4 = mysqli_query($conn, $query);
          if($result4 && mysqli_num_rows($result4) > 1){
            //query executed
            $assign_task = 'executed';
          }else{
            $assign_task = null;
          }

          // querying the database to get the list of task alloted
          $query = "SELECT task_id, task_title, email from tasks t, users u
          where u.user_id = t.user_id and project_id=".$_GET['project_id'];
          $result5 = mysqli_query($conn, $query);
          if($result5){
            $tasks = "executed";
          }else{
            $tasks = null;
          }

        }
      ?>
      <div class="row">
      <div class="col-twelve">
        <div class="card-header">
        <div class="col-seven"></div>
          <h3>Project Information</h3>
              <?php if($row['project_evaluation'] == 'not evaluated') {?>
                <button class="button" type="submit">
              <a href="../php/send_for_evaluation.php?project_id=<?php echo $_GET['project_id']?>"><i class="fa fa-check"></i>&nbsp;Send for Evaluation</a>
              </button>
            <?php }else{?>
              <h3>Already sent for evaluation.</h3>
            <?php } ?>
        </div>
          <table class="table-common">
            <tr>
              <td class="title"><h6>Project Name</h6></td>
              <td><p><?php echo $row['project_name'] ?></p></td>
            </tr>
            <tr>
              <td class="title"><h6>Project Description</h6></td>
              <td><p><?php echo $row['project_description']; ?></p></td>
            </tr>
          </table>
      </div>
      </div>
      <div class="row">
        <div class="card col-three">
            <div class="menu">
              <div class="table-header"><h2>Team Members</h2></div>
              <?php while($member = mysqli_fetch_assoc($result2)) {?>
                <div class="menuitem"><?php
                  if($member['project_role'] == 'leader'){
                  echo $member['email']."<strong>(Leader)</strong>";
                }else{
                  echo $member['email'];
                }
                ?></div>
              <?php }?>
              <button class="button" id="member_btn" onclick="addMember()"><i class="fa fa-plus"></i>&nbsp;ADD MEMBERS</button>
            </div>
          </div>

          <div class="card col-nine">
            <div class="menu">
              <div class="table-header">
                <h2>Tasks</h2>
              </div>
              <p>Task Allotted
                <button class="button" id="assign_btn" onclick="assignTask()"><i class="fa fa-plus"></i>&nbsp;Assign Tasks</button>
              </p>
              <table>
                <tr>
                  <th>Task number</th>
                  <th>Task Name</th>
                  <th>Assigned to</th>
                </tr>
                <?php
                  if($result5!=null && mysqli_num_rows($result5) > 0){
                    while($row = mysqli_fetch_assoc($result5)){
                      $data = "<tr>
                                <td>".$row['task_id']."</td>
                                <td>".$row['task_title']."</td>
                                <td>".$row['email']."</td>
                              </tr>";
                      echo $data;
                    }
                  }else{
                    echo "NO tasks assigned yet!";
                  }
                ?>
              </table>
            </div>
          </div>
      </div>

      <div id="modal1-background" align="center" class="modal-background">
        <div id="modal" class="modal">
          <form action="../php/add_member.php" method="post">
            <span id="close-btn" onclick="closeModal(document.getElementById('modal1-background'))">&times;</span>
            <label for="select_member">Select team member:-</label><br>
            <select name="select_member" name="member_id">
              <?php if($users != null){
                while($row = mysqli_fetch_assoc($result3)){
                  echo "<option value=".$row['user_id'].">".$row['email']."</option>";
                }
              }?>
            </select><br>
            <input type="hidden" name="project_id" value="<?php echo $_GET['project_id']?>">
            <button type="submit" name="add-btn">Add member</button>
          </form>
        </div>
      </div>

      <div class="modal-background" id="modal2-background">
        <div class="modal" align="center">
          <span id="close-btn" onclick="closeModal(document.getElementById('modal2-background'))">&times;</span>
          <form method="post" id="assign-task-form" action="../php/add_tasks.php">
              <h2>Assign a task to a member</h2>
              <label for="name">Title of the Task</label><br>
              <input type="text" name="name">

              <label for="description">Description of the task</label><br>
              <textarea name="description"></textarea><br>

              <label>Select member to assign task to:</label><br>
              <select name="assign_id">
              <?php if($assign_task != null){
                while($row = mysqli_fetch_assoc($result4)){
                  echo "<option value=".$row['user_id'].">".$row['email']."</option>";
                }
              }?>
              </select><br>
              <?php
                if($assign_task == null)
                  echo "No members to assign tasks to!<br>";
              ?>
              <input type="hidden" name="project_id" value="<?php echo $_GET['project_id']?>">
              <input type="submit" name="add_member_btn">
            <br>
          </form>
        </div>
      </div>

  </section>


<?php include('../layouts/footer.php');?>
    <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
   <script type="text/javascript">
    function addMember(){
      var modal = document.getElementById('modal1-background');
      modal.style.display = "block";
      window.onclick=function(event){
        if (event.target == modal){
            modal.style.display = "none";
         }
      }
    }
    function assignTask(){
      var modal = document.getElementById('modal2-background');
      modal.style.display = "block";
      window.onclick=function(event){
        if (event.target == modal){
            modal.style.display = "none";
         }
      }
    }
    function closeModal(element){
      element.style.display = "none";
    }

   </script>
</body>
</html>
