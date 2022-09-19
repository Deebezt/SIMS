<?php 

   include_once('connection.php');

   if(isset($_POST['HandleDelete'])){
   	 $id = $_POST['id'];
   	 $query = $connect->prepare("DELETE FROM student_record WHERE id=:id");
   	 $query->execute(array("id" =>$id));
   	  $num = $query->rowcount();
   	   if($num > 0){
   	   	 header("location:record.php");
   	   }
   }
  

 ?>