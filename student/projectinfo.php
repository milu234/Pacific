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
      height: 40%;
      width: 30%;
      
    }
    #close-btn{
      float:right;
      font-size:40px;
      font-weight: bold; 
      cursor: pointer;
    }
    #modal-background{
      position:fixed;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.6);
      z-index: 1;
      top:0;
      left:0;
      display: none;
    }
  </style>
</head>

<body id="top">
  <?php
  $active="projects";
   include('../layouts/nav.php') ?>

  <section class="projectinfo">
      <?php 
        if (isset($_GET['project_id'])){
          $conn = mysqli_connect('localhost', 'root', '', 'pacific') or die("couldnt connect to the db");
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
              header("location:http://localhost/Pacific/index.php");
            }
          }else{
            header("location:http://localhost/Pacific/index.php");
          }
          $query = "SELECT * from works_on where project_id=".$_GET['project_id']." and user_id=".$id;
          $result1 = mysqli_query($conn, $query);
          if(mysqli_num_rows($result1)==0){
            // if the user has not worked on the project
            $_SESSION['err'] = "Invalid project number";
            header("location:http://localhost/Pacific/index.php");
          }
          // query for the team members
          $query = "SELECT email from users u, works_on w where u.user_id=w.user_id and project_id=".$_GET['project_id'];
          $result2 = mysqli_query($conn, $query);
          if ($result2){
            // if the query executes
            if(mysqli_num_rows($result2) > 0) {
              // if there are team members, there is always going to be atleast one
              $members = "exists";
            }
          }else{
            //header("location:http://localhost/Pacific/index.php");
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

        }
      ?>
      <div class="row">
      <div class="col-twelve">
        <div class="card-header">
          <h3>Project Information</h3>
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
                <div class="menuitem"><?php echo $member['email']; ?></div>
              <?php }?>
              <button class="button" id="member_btn" onclick="addMember()"><i class="fa fa-plus"></i>&nbsp;ADD MEMBERS</button>
            </div>
          </div>

          <div class="card col-nine">
            <div class="menu">
              <div class="table-header"><h2>Tasks</h2></div>
              <p>Task Alloted</p>
              <h2>Task 1</h2>
              <p>Put The Html file and css in one folder</p>
              <h2>Tasks 2</h2>
              <p>Make The changes and commit</p>
            </div>
          </div>
      </div>
      
      <div id="modal-background" align="center">
        <div id="modal" class="modal" >
          <form action="http://localhost/Pacific/php/add_member.php" method="post">
            <span id="close-btn" onclick="closeModal()">&times;</span>
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
  
  </section>


<?php include('../layouts/footer.php');?>
    <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
   <script type="text/javascript">
    function addMember(){
      var modal = document.getElementById('modal-background');
      modal.style.display = "block";
      window.onclick=function(event){
        if (event.target == modal){
            modal.style.display = "none";          
         }
      }
    }
    function closeModal(){
      document.getElementById('modal-background').style.display = "none";
    }
   </script>
</body>
</html>
