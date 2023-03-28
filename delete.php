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
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .container{
        max-width: 80%;
        background-color: skyblue;
        margin: auto;
        padding: 23px;
    }
</style>
  <meta charset="UTF-8">
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
