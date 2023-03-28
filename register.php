<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	
	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];
	
	$email = $_POST['email'];
	
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];

	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords do not match.')</script>";
	} else {
		//Check if user with the same employee id already exists
		$query = "SELECT * FROM users where email='$email' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User already registered. Please login.')</script>";
		} else {
			//Insert new employee entry into database 
			$query = "INSERT INTO users ( first_name, last_name, email,pass) 
				VALUES ('$name1','$name2','$email','$pwd1')";

			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: index.php");
			} else {
				echo "<script>alert('Something went wrong!')</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
* {
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
}
.container{
        max-width: 80%;
        background-color: skyblue;
        margin: 15%;
        padding: 23px;
    }

h2 {
  margin-bottom: 30px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
  text-align: left;
}

input {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

button {
  padding: 10px 30px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}
</style>


<body>
	<div class="container">
		<div class="row col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Registration Form</h1> <br><br>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6 mb-4">
								
							</div>
							<div class="col-md-6 mb-4">
								

							</div>
						</div>
						<div class="form-group">
							<label for="name1" class="form-label">First Name</label>
							<input type="text" class="form-control" id="name1" name="name1" placeholder="First Name" required />
						</div>
						<div class="form-group">
							<label for="name2" class="form-label">Last Name</label>
							<input type="text" class="form-control" id="name2" name="name2" placeholder="Last Name" required />
						</div>
						
							
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="form-group">
									<label class="form-label" for="email">Email ID</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label for="pwd1" class="form-label">Password</label>
							<input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Password" required />
						</div>
						<div class="form-group">
							<label for="pwd2" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Confirm Password" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<button type="submit" name="submit"  class="btn btn-default">Register</button>
								
								      <br><br>Already a user? <a href="index.php">Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

