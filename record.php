
<?php
require_once 'connection.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=fpe", 'root', '');

    $sql = 'SELECT * FROM student_record ORDER BY id';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<style>
    .zoom {
  transition: transform 0.08s;

}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5);
    margin:0;
   padding:0;
   width:60%;
   height:90%;
}
a{
  color: white;
  text-decoration: none;
}
a:hover{
   color: white;
   text-decoration: none;
}


</style>
<body>
   <div class="container">
         	
          <div class="main">
        <div id="container">
            <h1>Student Record</h1>
             <input class="form-control" id="myInput" type="text" placeholder="Search..">
             <br>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>Gmail</th>
                        <th>Telephone</th>
                        <th>Dob</th>
                         <th>Gender</th>
                         <th>Images</th>
                         <th>Actions</th>
                    </tr>
                </thead>
                <tbody  id="myTable">
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gmail']; ?></td>
                            <td><?php echo $row['telephone']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td ><img   src="upload/<?php echo $row['profile'];?>" alt=" " height="50" width="50"></td>
                            <td>
                            	 <form method="post" action="Delete.php">
                            	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                            	 <button class="btn btn-info  ms-2"> <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></button>
                            	<button class="btn btn-danger ms-2" name="HandleDelete">Delete</button>
                            	 </form>
                            </td>
                           
                        </tr>

                    <?php endwhile; ?>
          
 
                </tbody>
            </table>

    </body>
</html>
 

  <script >
    $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  </script>

</html>