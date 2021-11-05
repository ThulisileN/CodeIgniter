<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<center>
<div class="container">
<div class="row">
<form name="form1" method="post" action="signup">
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<div class="col-md-6">
<label for="uname">User Name</label>
<input type="text" class="form-control" id="user_name" placeholder="Enter username" name="user_name"><br><br>
<label for="pwd">Password</label>
<input type="password" class="form-control" id="password" placeholder="Enter password" name="password"><br><br>
<label for="pwd">Confirm Password</label>
<input type="password" class="form-control" id="password" placeholder="Enter password again" name="passwordConfirm"><br><br>
<form><button formaction="<?php echo site_url('todo/index'); ?>" class="btn btn-sm btn-success pull-center">Register</button></form>
</div>
</div>
</div>
</center>
</body>
</html>