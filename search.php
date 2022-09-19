<?php
     session_start();
     include_once('connection.php');
     if(isset($_POST['find'])){
         $id = $_POST['id'];
         $query = $connect->prepare("SELECT * FROM virtual_record WHERE id=:id");
         $query->execute(array("id" =>$id));
         $num = $query->rowcount();
         if($num > 0){
             foreach ($query as $row) {
                $id = $row['id'];
                $name = $row['name'];
                $gmail = $row['gmail'];
                $telephone = $row['telephone'];
                $dob = $row['dob'];
                $gender = $row['gender'];

                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['gmail'] = $gmail;
                $_SESSION['telephone'] = $telephone;
                $_SESSION['dob'] = $dob;
                $_SESSION['gender'] = $gender;
                header("location:display.php");
             }
         }
         else{
          $message = "<div class='text-danger'>No Applicant Found!</div>";
         }
      }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Reg.css">
</head>
<style>
</style>
<body>
  <div class="col-md-6 m-auto py-5">

     <div class="card">
     	 <div class="card-body">
     	 	<div class="card-text">
          <h6 class="student_reg">Find Your application Details</h6>
     	 		 <form method="post">
            <?php 

                if(isset($message)){
                  echo ''.$message.'';
                }
             ?>
				   <div class="form-group">
     	 		 	 <input type="text" class="form-control" name="id" placeholder="Enter Transaction Id" required="true" />
     	 		 </div

				  
				   <div class="form-group">
     	 		 	 <button class="btn btn-success" name="find">Search</button>
           
     	 		 </div>
				  
				   </form>
     	 	</div>
     	 </div>
     </div>
  </div>
</body>
</html>