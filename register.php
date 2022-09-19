<?php
     session_start();
     include_once('connection.php');

     if(isset($_POST['create'])){
        $gmail = $_POST['gmail'];
        $query = $connect->prepare("SELECT * FROM  virtual_record WHERE gmail=:gmail");
        $query->execute(array("gmail"=>$gmail));
        $nums = $query->rowcount();
        if($nums >0){
           $message  =  "<div class='text-danger'>user already exist";
        }
        else{
        $name = $_POST['name'];
        $gmail = $_POST['gmail'];
        $telephone = $_POST['telephone'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $level = $_POST['level'];

        $query = $connect->prepare("INSERT INTO  virtual_record(name, gmail, telephone, dob, gender, level) VALUES('$name', '$gmail', '$telephone', '$dob', '$gender', '$level')");
        $query->execute(array(
            "name" =>$name,
            "gmail" =>$gmail,
            "telephone" =>$telephone,
            "dob" =>$dob,
            "gender" =>$gender,
            "level"=>$level
        ));
    if($query == true){
             
              $gmail = $_POST['gmail'];
              $query = $connect->prepare("SELECT  * FROM virtual_record WHERE  gmail=:gmail");
              $query->execute(array("gmail"=>$gmail));
              $num_row = $query->rowcount();
              if($num_row > 0){
              foreach ($query as $row) {
               $name = $row['name'];
               $gmail = $row['gmail'];
               $telephone = $row['telephone'];
               $dob = $row['dob'];
               $gender = $row['gender'];
               $level = $row['level'];
               $id = $row['id'];
             
             
               //declare session//
               $_SESSION['name'] = $name;
               $_SESSION['gmail'] = $gmail;
               $_SESSION['telephone'] = $telephone;
               $_SESSION['dob'] = $dob;
               $_SESSION['gender'] = $gender;
               $_SESSION['level'] = $level;
               $_SESSION['id'] = $id;
           
            
               header("location:display.php");

         }
       
       }
     }
   }
     }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>dddd</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Reg.css">
</head>
<style>
   span > a{
    color: green;
    position: relative;
   float: right;
   top: 5px;
   font-weight: bold;

   }
</style>
<body>
  <div class="col-md-6 m-auto">
  <h4 class="student_reg">Student Registeration</h4>
     <div class="card">
     	 <div class="card-body">
     	 	<div class="card-text">
     	 		 <form method="post">
            <?php 

                if(isset($message)){
                  echo ''.$message.'';
                }
             ?>
				   <div class="form-group">
     	 		 	 <input type="text" class="form-control" name="name" placeholder="Enter name" required="true" />
     	 		 </div>


				   <div class="form-group">
     	 		 	 <input type="gmail" class="form-control" name="gmail"  placeholder="Enter email" required="true"  />
     	 		 </div>


				   <div class="form-group">
     	 		 	 <input type="text" class="form-control" name="telephone"  placeholder="Enter Telephone"  required="true" maxlength="11" />
     	 		 </div>

				   <div class="form-group">
     	 		 	 <input type="date" class="form-control"  name="dob" placeholder="Enter dob" required="true"  />
     	 		 </div>

				   <div class="form-group">
     	 		 	 <select class="form-control" name="gender" required="true">
              <option disabled="true">---Gender---</option>
							<option>Male</option>
							<option>Female</option>
							<option>Gender</option>
						</select>
     	 		 </div>


				   <div class="form-group">
     	 		   <div class="form-group">
             <select class="form-control" name="level" required="true">
              <option disabled="true">---form type---</option>
              <option>ND (National diplioma)</option>
              <option>HND (Higer National Diplioma)</option>
                <option>RPT (Regular Per Time)</option>
            </select>
           </div>
     	 		 </div>

				   <div class="form-group">
     	 		 	 <button class="btn btn-success" name="create">Create account</button>
           <span>  <a href="search.php">Already have transaction Id</a></span>
     	 		 </div>
				  
				   </form>
     	 	</div>
     	 </div>
     </div>
  </div>
</body>
</html>