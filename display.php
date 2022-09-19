

<?php
     session_start();
     include_once('connection.php');

     if(isset($_POST['create'])){
        $gmail = $_POST['gmail'];
        $query = $connect->prepare("SELECT * FROM  student_record WHERE gmail=:gmail");
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
        // $images = $_FILES['profile']['name'];
        // $tmp_dir = $_FILES['profile']['tmp_name'];
        // $imgSize = $_FILES['profile']['size'];
        // $upload_dir ="upload/";
        //   $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        //   $valid_extension = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        //   $profile = rand(1000, 1000000).".".$imgExt;
        //   move_uploaded_file($tmp_dir, $upload_dir.$profile);

        $query = $connect->prepare("INSERT INTO  student_record(name, gmail, telephone, dob, gender, level) VALUES('$name', '$gmail', '$telephone', '$dob', '$gender', '$level')");
        $query->execute(array(
            "name" =>$name,
            "gmail" =>$gmail,
            "telephone" =>$telephone,
            "dob" =>$dob,
            "gender" =>$gender,
            "level"=>$level
        ));
    if($query == true){
              echo "success";

         }
       
       }
     }
   
     

   

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Display infomation</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
         <div class="container">
           <div class="main">
             <div class="display-main col-md-8 m-auto py-5">
               <table class="table table-bordered">
               	 
               	  <tr>
                    <th>Transaction Id</th>
                    <td><?php echo $_SESSION['id']; ?></td>
               	  </tr>

               	   <tr>
                    <th>Name</th>
                       <td><?php echo $_SESSION['name']; ?></td>

               	  </tr>

               	   <tr>
                    <th>Gmail</th>
                      <td><?php echo $_SESSION['gmail']; ?></td>
               	  </tr>


               	   <tr>
                    <th>Telephone</th>
                      <td><?php echo $_SESSION['telephone']; ?></td>
               	  </tr>

               	   <tr>
                    <th>Dob</th>
                    <td><?php echo $_SESSION['dob']; ?></td>
               	  </tr>

               	   <tr>
                    <th>Gender</th>
                    <td><?php echo $_SESSION['gender']; ?></td>
               	  </tr>

               	   <tr>
                    <th>Level</th>
                     <td><?php echo $_SESSION['level']; ?></td>
               	  </tr>
               	   <tr>
                   <iframe name="votar" style="display:none;"></iframe>
                   <form method="post"  target="votar" enctype="multipart/form-data">
                     <?php if(isset($message)){
                       echo ''.$message.'';
                      }
                       ?>
                     <input  type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" />
                     <input  type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>" />
                     <input  type="hidden" name="gmail" value="<?php echo $_SESSION['gmail']; ?>" />
                     <input  type="hidden" name="telephone" value="<?php echo $_SESSION['telephone']; ?>" />
                     <input  type="hidden" name="dob" value="<?php echo $_SESSION['dob']; ?>" />
                     <input  type="hidden" name="gender" value="<?php echo $_SESSION['gender']; ?>" />
                     <input  type="hidden" name="level" value="<?php echo $_SESSION['level'];?>" />

                     <td colspan="2" class="text-center">
                     <button onclick="fireSweetAlert()" class="btn btn-success" name="create">Proceed</button>
                    </td>
                   </form>
                     
               	  </tr>
               	 
               </table>
             </div>
           </div>
         </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.5.6/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/sweetalert2/6.5.6/sweetalert2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>

    function fireSweetAlert() {
        Swal.fire(
            'created successfully!',
            'You clicked the button!',
            'success'
        )
    }

  </script>
</html>