<?php
	include 'header.inc.php';
?>
<?php
echo '<header>Login page</header>';





?>

<link rel="stylesheet" type="text/css" href="style.css">
<div class="admhead">Login</div>
<div class="container" id="frm">
<form action="loginauth.php" method="post"
<p>
<label>User Id: </label>
<input type="text" id="user" name="idno" />
</p>
<p>
<label>Password: </label>
<input type="password" id="pass" name="pass" />
</p>
<input class="button" type="submit" id="btn" value="Login" />
</form>

<a href="page1.php">Go back to main page</a>

</div>

	<footer id="main-footer">
	<hr>
	Teacher evaluation &copy; 2021
	</footer> 