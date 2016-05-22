<?php

if(isset($_POST['submit'])) {
	$conn = new mysqli("localhost", "admin", "12Oblivion!", "FamilyApp");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$selectSql = "SELECT username FROM userInfo WHERE username LIKE '%" . $_POST["username"] . "%'";
	$result = $conn->query($selectSql);

	if ($result->num_rows > 0) {
		echo "<script>alert('Sorry but a user already exists with that username! Please try again with another username.');</script>";
	} else {
		$insertSql = "INSERT INTO userInfo (username, password, email) VALUES ('" . $_POST['username'] . "', '" . sha1($_POST['password']) . "', '" . $_POST['email'] . "')";
		$insertResults = $conn->query($insertSql);
		header('Location: login.php'); 
	} 
	$conn->close();
}


//start html
include 'includes/header.php' ?>

<div id="main">
	<div id="content" class="container"> 
		<h2>Register</h2>
		<form class="form-horizontal" role="form" method="POST" action="register.php" name="regForm" id="regForm"> 
        	<div class="form-group"> 
                <label class="col-md-4 control-label">Username:</label>

                <div class="col-md-6" style="margin-bottom:10px;">
                    <input type="text" class="form-control" name="username" id="username" autofocus>
                </div>

                <label class="col-md-4 control-label">Password:</label>

                <div class="col-md-6" style="margin-bottom:10px;">
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <label class="col-md-4 control-label">Confirm Password:</label>

                <div class="col-md-6" style="margin-bottom:10px;">
                    <input type="password" class="form-control" name="confrmPass" id="confrmPass">
                </div>

                <label class="col-md-4 control-label">Email:</label>

                <div class="col-md-6" style="margin-bottom:10px;">
                    <input type="text" class="form-control" name="email" id="email">
                </div>

                <label class="col-md-4 control-label"></label>

                <div class="col-md-6">
                    <input type="submit" class="form-control" name="submit" id="submit" onClick="return checkForm(regForm);">
                </div>
            </div>
        </form>
	</div>
</div>

<script type="text/javascript">
    function checkForm(regForm) {
	    if (regForm.password.value != regForm.confrmPass.value) {
	        alert("Password is not the same!");
	        return false;
	    }
	}
</script>

<?php include 'includes/footer.php' ?>