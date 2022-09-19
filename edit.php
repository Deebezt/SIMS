<?php
session_start();
include('connection.php');
?>
<?php 
  $name = "";
  include_once('connection.php');
 
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $telephone = $_POST['telephone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $images = $_FILES['profile']['name'];
    $tmp_dir = $_FILES['profile']['tmp_name'];
    $imgSize = $_FILES['profile']['size'];
    $upload_dir ="upload/";
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extension = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $profile = rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$profile);
    $query = $connect->prepare("UPDATE student_record set name=:name, gmail=:gmail, telephone=:telephone, dob=:dob, gender=:gender, profile=:profile WHERE id=:id");
    $query->execute(array(
           "id"=>$id,
          "name"=>$name,
          "gmail"=>$gmail,
          "telephone"=>$telephone,
          "dob"=>$dob,
          "gender"=>$gender,
          "profile"=>$profile
        ));

       $num_row = $query->rowcount();
       if($num_row > 0){
          header("location:record.php");
       }
      

  }


 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Reg.css">

    <title>Edit</title>
</head>
<body>
    
    <div class="container">
      <div class="main">

              <div class="row">

            <div class="col-md-12 m-auto">
                        <form  method="POST" enctype="multipart/form-data">
                        <h4>Edit Profile</h4>
                         <div class="row">
                        <div class="col-md-6 m-auto">
                            <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $query = $connect->prepare("SELECT * FROM student_record WHERE id=:id");
                            $query->execute(array("id" =>$id));
                        
                            $result = $query->fetch(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC
                        }
                        ?>

                            <div class="mb-3">
                               
                                <input type="text" name="id" hidden="true" value="<?php echo $result['id']; ?>" class="form-control" />
                            </div>

                              <div class="mb-3">
                                <input type="text"  name="name" value="<?php echo $result['name']; ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <input type="text"  name="gmail" value="<?php echo $result['gmail']; ?>" class="form-control" />
                            </div>

                              <div class="mb-3">
                                <input type="text"  name="telephone" value="<?php echo $result['telephone']; ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <input type="date"   name="dob" value="<?php echo $result['dob']; ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <input type="text"  name="gender" value="<?php echo $result['gender']; ?>" class="form-control" />
                            </div>


                            <div class="mb-3">
                                <input type="file"  name="profile"  class="form-control" />
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-success" name="update">Update</button>
                            </div>
                           
                        </form>
                        </div>
                     
                        </div>
                        </div>
                        </div>
                        </div>

                

       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>