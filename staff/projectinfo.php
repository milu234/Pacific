<!DOCTYPE html>
<html>
<head>
  <title>ProjectDashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/projectinfo.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <link rel="stylesheet" href="../css/notif-styles.css">
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
      if(isset($_GET['project_id'])){
        $conn = mysqli_connect('localhost', 'root', '', 'pacific')
        or die("couldnt connect to the database");
        //
        $query = "SELECT project_name, project_description from projects where project_id=".$_GET['project_id'];
        $result = mysqli_query($conn, $query);
        if($result){
          $project_info = mysqli_fetch_assoc($result);
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
              <td><p><?php echo $project_info['project_name']?></p></td>
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
              <button class="collapsible">Student 1<i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <p>Task Performed by student 1</p>
              </div>
              <button class="collapsible">Student 2<i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <p>Task Performed by student 2</p>
              </div>
              <button class="collapsible">Student 3<i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <p>Task Performed by student 3</p>
              </div>

            </div>
          </div>
      </div>
      <?php
      $user=unserialize($_SESSION['user']);
        $query = "SELECT project_marks, project_comments, user_id from project_evaluation where project_id=".$_GET['project_id'];
        $evaluated = mysqli_query($conn, $query);
       ?>
      <br>

      <?php if(mysqli_num_rows($evaluated) == 0){?>
          <!--Project not evaluated-->
        <div style="text-align: center;" class="row">
          <button style="background-color: #24b3ab;" class="button" onclick="showModal()">Mark as Evaluated</button>
        </div>
      <?php }else{
        $user_id = mysqli_fetch_assoc($evaluated)['user_id'];
        $query = "SELECT email from users where user_id=$user_id";
        $teacher = mysqli_fetch_assoc(mysqli_query($conn, $query));
        ?>
        <div style="text-align: center;" class="row">
          <p style="background-color: #24b3ab;color: #000">
            Project has already been evaluated by <?php
            $teacher_email = mysqli_fetch_assoc(mysqli_query($conn, $query))['email'];
            echo $teacher_email;
            ?>
          </p>
        </div>
      <?php }?>

  </section>
<div id="modal-background">
  <div id="modal-main" align="center">
      <span id="close-btn" onclick="closeModal();">&times;</span>
      <h1>Enter Marks to Evaluate</h1>
      <form action="../php/evaluate_project.php" method="post">
          <label for="marks">Enter Marks:</label><br>
          <input name="marks" type="number" required value=""><br><br>
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
  <script type="text/javascript">
      var status = "<?php echo $_SESSION['show_notif']; ?>";
      function closeNotif() {
         document.getElementById('notif-box').style.opacity = 0;
         document.getElementById('notif-box').style.left = "-400px"
      }
      function showNotif(){
         document.getElementById('notif-box').style.backgroundColor = "<?php echo $_SESSION['notif-box-color']; ?>";
         document.getElementById('notif-box-content').innerHTML = "<?php echo $_SESSION['notif-box-message']?>";
         document.getElementById('notif-box').style.opacity = 1;
         document.getElementById('notif-box').style.left = "10px";
      }
      if(status == "1"){
         setTimeout(showNotif, 500);
         setTimeout(closeNotif, 5000);
      }
   </script>
 <?php
      // clear the session var so that the message does not reappear everytime the page reloads
      if(isset($_SESSION['show_notif']))
         unset($_SESSION['show_notif']);
   ?>

<?php include('../layouts/footer.php');?>
    <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>
