<?php session_start(); /* Starts the session */
/* Check Login form submitted */if(isset($_POST['Submit'])){
/* Define username and associated password array */$logins = array('thuli@digilims.com' => 'digilims','username1' => 'password1','thulisile@digilims.com' => 'Digilims');

/* Check and assign submitted Username and Password to new variable */$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

/* Check Username and Password existence in defined array */if (isset($logins[$Username]) && $logins[$Username] == $Password){
/* Success: Set session variables and redirect to Protected page  */$_SESSION['UserData']['Username']=$logins[$Username];
header("location:index");
exit;
} else {
/*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Invalid Username/Password!</span>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<center>
<div class="container">
<div class="row">
<form name="form1" method="post" action="login">
<br></br>
	<br></br>
	<br></br>
	<br></br>
	<h1>Task List</h1>
    <h1>Login</h1>
	<div class="col-md-6">
<label for="uname">UserName:</label>
<input type="text" class="form-control" id="username" placeholder="Enter username" name="Username"><br><br>
<label for="password">Password:</label>
<input type="password" class="form-control" id="password" placeholder="Enter password" name="Password" name="password"><br><br>
<?php if(isset($msg)){?>
    
	<?php echo $msg;?>
  
  <?php } ?>
  <br></br>
<input name="Submit" type="submit" value="Login" class="btn btn-sm btn-success">
</div>
</div>
</div>
</center>
</form>
</body>
</html>