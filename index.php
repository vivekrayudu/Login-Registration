<?php
require 'config.php';
if (isset($_POST['submit'])) {
	$empid = $_POST['emp'];
	$pwd = $_POST['pass'];
	
	// select query to check if profile exists 
	$query = "SELECT * FROM users WHERE email='$empid' and pass='$pwd'";
	$result = mysqli_query($conn, $query);
	
	//If there exists a row with the given credentials, then redirect to respective profile page otherwise stay on same page by alert 
	if (mysqli_num_rows($result) != 0) {
		session_start();
		$_SESSION['sess_user'] = $empid;
		header("Location: profile.php");
	} else {
		echo "<script>alert('Invalid email or password.')</script>";
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
        margin: auto;
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
					<h1 style="text-align: center;">Sign In</h1>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-label" for="eid">Email ID</label>
							<input type="text" class="form-control" name="emp" id="eid" placeholder="Email"  required />
						</div>
						<div class="form-group">
							<label for="pwd" class="form-label">Password</label>
							<input type="password" class="form-control" id="pwd" name="pass" placeholder="Password" required />
						</div>
						<div class="row">
							<div style="align-items: center;padding-left: 3%;">
								<input type="submit" value="Login" name="submit" /><br><br>
								No credentials yet? <a href="register.php">Register</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
