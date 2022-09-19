<!DOCTYPE html>
<html>
<head>
	<title>Student information</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
         <div class="container">
         	 <div class="main">
          <div >

        <div class="main-list">
        <div>Student Record </div>
        <div onClick="showHidden()"><a href="record.php">View Record</a></div>

      </div>
          <div class="user-section">
                <?php inClude_once('register.php') ?>
          </div>
       
          </div>
         	 </div>
         </div>
</body>

</html>