<?php
require 'config.php';
session_start();
if (!isset($_SESSION["sess_user"]) ) {
  header("location: index.php");
  exit;
}
 

$empid = $_SESSION['sess_user'];
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "DELETE FROM users WHERE email = '$empid'";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    
    if (mysqli_stmt_execute($stmt)) {
      session_destroy();
      header("location: index.php");
      exit;
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
  <title>Delete Account</title>
</head>

<body>
  <div>
    <div class="container">
    <h2>Delete Account</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p>Are you sure you want to delete your account? This action cannot be undone.</p>
      <input type="submit" value="Delete" class="btn btn-danger">
      <a href="profile.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
