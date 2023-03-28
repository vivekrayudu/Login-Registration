<?php
//Connect to MySQL server 
require 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: index.php");
}

//Find various fields for an employee and save them in variables for display purposes 
$empid = $_SESSION['sess_user'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$empid'");
$row = mysqli_fetch_array($result);

$name1 = $row["first_name"];
$name2 = $row["last_name"];




?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      height: 90vh;
    }
	.container{
        max-width: 80%;
        background-color: skyblue;
        margin: auto;
        padding: 23px;
    }
  </style>
</head>

<body>
	<div class="container">
	<h2> <?php echo "Welcome " . $name1 . " " .$name2; ?> </h2>
	
	

    <br />
	<a href="view.php"> View Information </a><br />

	<br />
	<a href="update.php"> Update Information </a><br />
	<br />
	<a href='delete.php ? em=$empid' >Delete Account</a><br />


   <br>
	<a href="index.php"> Log out </a>
	</div>
</body>

</html>