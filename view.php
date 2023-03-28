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


$email = $row["email"];

?>


<!DOCTYPE html>
<html lang="en">



	<style>
		.container {
  display: flex;
  align-items: center;
  justify-content: center;
}

table {
  margin: 0 auto;
}

		table td {
  background-color: skyblue;
}

table th, table td {
  border: 1px solid #ddd;
  padding: 8px;
}



	</style>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      height: 90vh;
    }
	.container{
        max-width: 80%;
        background-color: white;
        margin: auto;
        padding: 23px;
    }
  </style>


<body>
	

<table>

	<div class="container" >
		<tr>
			<td>First Name : </td>
			<td><?php echo $name1 ;echo "\t" ; ?></td>
            <br>
        </tr>
        <tr>
            <td>Last Name : </td>
			<td><?php echo $name2; ?></td>
		</tr>
		
		
		
		<tr>
			<td>Email : </td>
			<td><?php echo $email; ?></td>
		</tr>
    </div>
	</table>
	</body>

</html>