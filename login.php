<?php
session_start();

if(isset($_POST['submit'])) {
	$conn = new mysqli("localhost", "admin", "12Oblivion!", "FamilyApp");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$selectSql = "SELECT username FROM userInfo WHERE username LIKE '%" . $_POST["username"] . "%' AND password LIKE '%" . sha1($_POST['password']) . "%'";
	$result = $conn->query($selectSql);

	if ($result->num_rows > 0) {
		$_SESSION['username'] = $_POST['username'];

		header('Location: index.php');
	} 
}

//start html
include 'includes/header.php' 

?>

<div id="main">
	<div id="content" class="container"> 
		<h2>Login</h2>
		<form class="form-horizontal" role="form" method="POST" action="login.php" name="regForm" id="regForm"> 
        	<div class="form-group"> 
                <label class="col-md-4 control-label">Username:</label>

                <div class="col-md-6" style="margin-bottom:10px;">
                    <input type="text" class="form-control" name="username" id="username" autofocus>
                </div>

                <label class="col-md-4 control-label">Password:</label>

                <div class="col-md-6" style="margin-bottom:10px;">
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <label class="col-md-4 control-label"></label>

                <div class="col-md-6">
                    <input type="submit" class="form-control" name="submit" id="submit" onClick="return checkForm(regForm);">
                </div>
            </div>
        </form>
	</div>
</div>

<?php include 'includes/footer.php' ?>