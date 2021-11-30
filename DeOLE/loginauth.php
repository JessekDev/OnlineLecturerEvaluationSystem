<?php
	include 'header.inc.php';
	// require 'core.inc.php';
?>
<?php



if (isset($_POST['idno']) && isset($_POST['pass'])){
	// get values passed from form in login.php 
	$idno = $_POST['idno'];
	$pass = $_POST['pass'];

	// to prevent mysql injection
	$idno = stripcslashes($idno);
	$pass= stripcslashes($pass);
	if(!empty($_POST['idno']) && !empty($_POST['pass'])){
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$database = 'evaluationdatabase';

		// connect to the server and select database
		$dbc = @mysqli_connect($host, $user, $password, $database)
		OR die('Could not connect to MySQL ' . mysqli_connect_error());


		// query the database for user
		$query = "SELECT * from useradm where id = '$idno' and password = '$pass'";
		if($result = mysqli_query($dbc,$query)){
		
			$row = mysqli_fetch_array($result);
			if($row == 0){
				echo 'Invalid combination';
			
			} else{

				if($row['id'] == $idno && $row['password'] == $pass){
					echo "Login successful. Welcome ".$row['name'].".";
					
					// user session
					/* $user_id = mysqli_result($result, 0, 'id');
					 $_SESSION['user_id']=$user_id;
					 header('Location: loginauth.php');
					 if(loggedin()) {
						echo 'Loggggg';
						echo '<a href="adminlogin.php">Log out</a>';
						} else{ include 'adminlogin.php'; }
					*/
					
					// proceed
					echo '<br><br><a class="button" href="admindashboard.php">Proceed to dashboard</a>';
					
				} else {
				echo "Failed to login";
				} }
		} else{
			die("Failed to query database ".mysqli_error());
		}
		} else {
			echo 'Type correct password ';
			//<br><a class="button" href="loginauth.php">Retry</a>';
		}
}




?>



	<!-- <footer id="main-footer">
	<hr>
	Teacher evaluation &copy; 2021
	</footer> -->