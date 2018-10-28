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
    #modal-background{
      display: none;
      top: 0;
      left:0;
      position: fixed;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      z-index: 1000;
    }
    #modal-main{
      position: fixed;
      background-color: white;
      top:15%;
      left: 35%;
      padding:15px;
    }
    #close-btn{
      font-size: 40px;
      font-weight: bold;
      float: right;
      cursor: pointer;
    }
  </style>
</head>

<body id="top">
  <?php
  $active="projects";
  include('../layouts/nav.php')
  ?>

  <section class="projectinfo">
    <?php
    require "../php/includes/db.php";
      if(isset($_GET['project_id'])){
        $id = $_GET['project_id'];
        $query1 = "SELECT project_name, project_description,project_link from projects where project_id=".$_GET['project_id'];
        $result1 = mysqli_query($conn, $query1);
        $query2 = "SELECT u.name,t.task_title,t.task_description from users as u,tasks as t where u.user_id in (select user_id from works_on where project_id = $id) and t.user_id = u.user_id";
        $result2 = mysqli_query($conn,$query2);
        $query3 = "SELECT project_evaluation from projects where project_id = $id";
        $result3 = mysqli_query($conn,$query3);
        $row_count = mysqli_num_rows($result2);
        if($result1){
          $project_info = mysqli_fetch_assoc($result1);
        }
        if($result2){
          $project_members = mysqli_fetch_all($result2);
        }
        if($result3){
          $project_status = mysqli_fetch_assoc($result3);
        }
    }
    ?>
    <div class="row">
      <div class="col-twelve">
        <div class="table-header">
          <h3 class="add">Project Information</h3>
        </div>
          <table class="table-common">
            <tr>
              <td class="title"><h5>Project Name</h5></td>
              <td><a href="<?php echo $project_info['project_link']?>" target="_blank"><p style="font-size:20px; font-weight:bold;"><?php echo $project_info['project_name']?></p></a></td>
            </tr>
            <tr>
              <td class="title"><h5>Project Description</h5></td>
              <td><p><?php echo $project_info['project_description']?></p></td>
            </tr>
          </table>
      </div>
    </div>
    <br>
      <div class="row">
          <div class="card col-twelve">
            <div class="menu">
              <div class="table-header"><h2 class="add">Tasks Performed By Each Student</h2></div>
              <?php
              for($i=0;$i<$row_count;$i++){
              ?>
                <button class="collapsible"><?php echo $project_members[$i][0]  ?><i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <table class="table-common">
                <tr>
                  <h4>Task Name</h4>
                  <p><?php echo $project_members[$i][1]?></p>
                </tr>
                <tr>
                <h4>Task Description</h4>
                <p><?php echo $project_members[$i][2]?></p>
                </tr>
                </table>               
              </div>
              <?php } ?>
            </div>
          </div>
      </div>
      <br>
      <div style="text-align: center;" class="row">
      <?php if($project_status['project_evaluation'] == "sent for evaluation") { ?>
        <button style="background-color: #24b3ab;" class="button" onclick="showModal()">Mark as Evaluated</button>
      <?php }?>
      </div>

  </section>
<div id="modal-background">
  <div id="modal-main" align="center">
      <span id="close-btn" onclick="closeModal();">&times;</span>
      <h1>Enter Marks to Evaluate</h1>
      <form action="../php/evaluate_project.php" method="post">
        <label for="marks">Enter Marks:</label><br>
        <input name="marks" type="number" required><br><br>
        <label for="comments">Comments/Remarks(If any):</label><br>
        <textarea name="comments"></textarea><br><br>
        <button type="submit" name="evalute" class="button">Evaluate</button>
        <input type="hidden" name="project_id" value="<?php echo $_GET['project_id']?>">
      </form>
  </div>
</div>
  <script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
  function showModal(){
    document.getElementById('modal-background').style.display = "block";
  }
  function closeModal(){
    document.getElementById('modal-background').style.display = "none";
  }
  </script>

<div class="clearfix"></div>

<?php include('../layouts/footer.php');?>
    <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>
