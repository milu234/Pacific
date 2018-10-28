<!DOCTYPE html>
<html>
<head>
	<title>ProjectDashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/projects.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body id="top">
   <?php
   require "../php/includes/db.php";
   $active="projects";
   include('../layouts/nav.php') ?>

   <div id="id2" class="modal">
      <form class="modal-content animate" action="../php/create_projects.php" method="POST" >
         <span onclick="document.getElementById('id2').style.display='none'" class="close" title="Close Modal">&times;</span>
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Project</h5>
            <hr>

            <div class="row">
               <div class="col-three">
                  <label for = "nameoftheproject"><b>Name of the Project</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the name of the project" name = "nameoftheproject" required>
               </div>
            </div>

            <div class="row">
               <div class="col-three">
                  <label for = "descriptionoftheproject"><b>Description</b></label>
               </div>
               <div class="col-eight">
                  <textarea style="width:100%; height : 50px;" placeholder="Enter the description of the project" name="descriptionoftheproject" required></textarea>
               </div>
            </div>

            <div class="row">
               <div class="col-three">
                  <label for = "projectstatus"><b>Project Status</b></label>
               </div>
               <div class="col-eight">
                  <input type="range" min="1" max="100" value="50" class="slider" id="MyRange" name="range" >
                  <p>Project Completion Status - <span id="demo"></span>%</p>
               </div>
            </div>

            <div class="row">
               <div class="col-three">
                  <label for = "projectgithublink"><b>Project Github Link</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the Project Github Link" name="projectgithublink" >
               </div>
            </div>


                    <div class="row">
               <div class="col-three">
                  <label for = "githubusername"><b>Github Username</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the  Github username" name="githubusername" >
               </div>
            </div>






            <div class="formrow clearfix" style="justify-content: center;">
               <div class="col-six" style="text-align: center;">
                  <button type="submit" class="signupbtn" name="save" >Save</button>
               </div>
               <div class="col-six" style="text-align: center;">
                  <button onclick="document.getElementById('id2').style.display='none'" class="cancelbtn">Cancel</button>
               </div>
            </div>
         </div>
      </form>
   </div>




   <section class="stats">
         <div class="row">
            <button onclick="document.getElementById('id2').style.display='block'" style="width:auto; float: right;"><i class="fa fa-plus"></i>&nbsp;Create Project</button>
         </div>
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Projects Sent for Evaluation</h5>
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Completion Status</th>
                           <th>Evaluation Status</th>
                        </tr>
                        <?php
                        // query the project details
                       
                        $id = $user->id; // current user id retrieved from session
                        $query = "SELECT p.project_id, project_name, project_status,project_evaluation
                        FROM projects p, works_on w WHERE p.project_id=w.project_id
                        AND user_id=".$id." AND not project_evaluation='not evaluated'";
                        $result = mysqli_query($conn, $query);
                        if($result){
                           // if query executes sucessfully
                           if(mysqli_num_rows($result)>0){
                              // if the user has projects
                              $rows = "executed";
                           } else{
                              $rows = null;
                            //   echo "no projects found for the user";
                           }
                        }else{
                           echo "db error";
                        }
                        ?>
                        <?php if ($rows != null) { ?>
                        <?php while ($row=mysqli_fetch_assoc($result)){
                           // creates the link for every project
                           $link = "http://".$_SERVER['HTTP_HOST']."/Pacific/student/projectinfo.php?project_id=".$row['project_id'];
                           $status = $row['project_status'];
                           ?>
                        <tr>
                           <td><a href="<?php echo $link;?>"><h4><?php echo $row['project_name'];?></h4></a></td>
                           <td style="width: 25%">
                              <div class="progress-bar green stripes">
                                  <span style="width: <?php echo $status?>%" ></span>
                              </div>
                           </td>
                           <td style="width: 25%" class="score"><?php echo $row['project_evaluation']?></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                     </table>
                  </div>
         </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Projects Created</h5>
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Completion Status</th>
                        </tr>
                        <?php
                        // query the project details
                        $id = $user->id; // current user id retrieved from session

                        $query = "SELECT p.project_id, project_name, project_status
                        FROM projects p, works_on w WHERE p.project_id=w.project_id
                        AND user_id=".$id." AND project_role='leader'";
                        $result = mysqli_query($conn, $query);
                        if($result){
                           // if query executes sucessfully
                           if(mysqli_num_rows($result)>0){
                              // if the user has projects
                              $rows = "executed";
                           } else{
                              $rows = null;
                              //echo "no projects found for the user";
                           }
                        }else{
                           echo "db error";
                        }
                        ?>
                        <?php if ($rows != null) {?>
                        <?php while ($row=mysqli_fetch_assoc($result)){
                           // creates the link for every project
                           $link = "http://".$_SERVER['HTTP_HOST']."/Pacific/student/projectinfo.php?project_id=".$row['project_id'];
                           $status = $row['project_status'];
                           ?>
                        <tr>
                           <td ><a href="<?php echo $link;?>"><h4><?php echo $row['project_name'];?></h4></a></td>
                           <td style="width: 25%">
                              <div class="progress-bar green stripes">
                                  <span style="width: <?php echo $status ?>%" ></span>
                              </div>
                           </td>
                        </tr>
                        <?php } ?>
                        <?php } else { echo "No projects found for the user";}?>
                     </table>
                  </div>
         </div>
         </div>
   </section>

<div class="clearfix"></div>
   <script >


      var modal = document.getElementById('id2');

//When the users click anywhere outside the modal
window.onclick = function(event) {
   if (event.target == modal){
      modal.style.display = "none";
   }
   // body...
}
       var slider = document.getElementById("MyRange");
       var output = document.getElementById("demo");
       output.innerHTML = slider.value;

       slider.oninput = function(){
          output.innerHTML = this.value;

       }
   </script>
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/main.js"></script>
   <?php include('../layouts/footer.php');?>
</body>
</html>
