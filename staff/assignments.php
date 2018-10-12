<!DOCTYPE html>
<html>
<head>
	<title>Assignment Dashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/projects.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body id="top">
   <?php
   $active="assignments";
    include('../layouts/nav.php') ?>

   <div id="id2" class="modal">
      <form class="modal-content" action="../php/create_assignments.php"  method="POST"  >
         <span onclick="document.getElementById('id2').style.display='none'" class="close" title="Close Modal">&times;</span>
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Asignment</h5>
            <hr>

            <!-- Name of the assignment -->
            <div class="row">
               <div class="col-four">
                  <label for = "nameoftheassignment"><b>Name of the Assignment</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the name of the assignment" name = "nameoftheassignment" required>
               </div>
            </div>
            <div class="row">
               <div class="col-four">
                  <label for = "marksallotedtotheassignment"><b>Description</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the marks alloted to the assignment" name="marksallotedtotheassignment" required>
               </div>
            </div>
            <div class="row">
               <div class="col-four">
                  <label for = "selectclass"><b>Select Class</b></label>
               </div>
               <div class="col-eight">
                  <select class="round"  name="classalloted">
                     <option value="0" disabled>Select Class</option>
                     <option value="D5">D5</option>
                     <option value="D10">D10</option>
                     <option value="D15">D15</option>
                     <option value="D20">D20</option>
                     <option value="Teaching_staff">Teaching Staff</option>               
                  </select>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-four">
                  <label for = "assignmenttype"><b>Assignment Type</b></label>
               </div>
               <div class="col-eight">
                  <select class="round" name="assignment_type"  >
                     <option value="0" disabled>Assignment Type</option>
                     <option value="document">Document</option>
                     <option value="code">Code</option>
                  </select>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-four">
                  <label for ="deadline">Deadline</label>
               </div>
               <div class="col-eight"></div>
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
            <button onclick="document.getElementById('id2').style.display='block'" style="width:auto; float: right;"><i class="fa fa-plus"></i>&nbsp;Create Assignment</button>
         </div>
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Evaluated</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 1</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 2</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 3</h4></a></td>
                        </tr>
                     </table>
                  </div>
            </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Not Evaluated</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 1</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 2</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 3</h4></a></td>
                        </tr>
                     </table>
                  </div>
            </div>
         </div>
   </section>
	
   <div class="clearfix"></div>
	<?php include('../layouts/footer.php') ?>
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
</body>
</html>