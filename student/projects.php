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
   $active="projects";
   include('../layouts/nav.php') ?>

   <div id="id2" class="modal">
      <form class="modal-content" action="index.html">
         <span onclick="document.getElementById('id2').style.display='none'" class="close" title="Close Modal">&times;</span>
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Project</h5>
            <hr>

            <div class="formrow">
               <div class="col-three">
                  <label for = "nameoftheproject"><b>Name of the Project</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the name of the project" name = "nameoftheproject" required>
               </div>
            </div>

            <div class="formrow">
               <div class="col-three">
                  <label for = "descriptionoftheproject"><b>Description</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the description of the project" name="descriptionoftheproject" required>
               </div>
            </div>

            <div class="formrow">
               <div class="col-three">
                  <label for = "projectstatus"><b>Project Status</b></label>
               </div>
               <div class="col-eight">
                  <input type="range" min="1" max="100" value="50" class="slider" id="MyRange">
                  <p>Project Completion Status - <span id="demo"></span>%</p>
               </div>
            </div>

            <div class="formrow">
               <div class="col-three">
                  <label for = "projectgithublink"><b>Project Github Link</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the Project Github Link" name="projectgithublink" > 
               </div>
            </div>
            
            <div class="formrow clearfix" style="justify-content: center;">
               <div class="col-six" style="text-align: center;">
                  <button type="submit" class="signupbtn">Save</button>
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
                     <h5 class="add">Projects Submitted</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Completion Status</th>
                           <th>Evaluation Status</th>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 1</h4></a></td>
                           <td style="width: 25%">
                              <div class="progress-bar green stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                           <td style="width: 25%" class="score">Evaluated</td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 2</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                           <td class="score">Not Evaluated</td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 3</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                           <td class="score">Evaluated</td>
                        </tr>
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
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 1</h4></a></td>
                           <td style="width: 25%">
                              <div class="progress-bar green stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 2</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 3</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
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
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
   <?php include('../layouts/footer.php');?>
</body>
</html>