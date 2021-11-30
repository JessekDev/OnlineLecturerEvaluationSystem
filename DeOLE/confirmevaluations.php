<?php
	include 'header.inc.php';
?>

<html>
<head>
<title>Evaluations confirmation</title>
</head>
<body>

<?php
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_NAME', 'evaluationdatabase');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' . mysqli_connect_error());

if(isset($_POST['submit'])) {
	$data_missing = array();
	
	if(empty($_POST['course'])) {
		$data_missing[] = 'Course';
	} else {
		$course = trim($_POST['course']);
	}
	
	if(empty($_POST['yos'])) {
		$data_missing[] = 'Year of study';
	} else {
		$yos = trim($_POST['yos']);
	}
	
	if(empty($_POST['sem'])) {
		$data_missing[] = 'Semester';
	} else {
		$sem = trim($_POST['sem']);
	}
	
	if(empty($_POST['acad_year'])) {
		$data_missing[] = 'Academic year';
	} else {
		$acad_year = trim($_POST['acad_year']);
	}
	
	if(empty($_POST['unit_code'])) {
		$data_missing[] = 'Unit code';
	} else {
		$unit_code = trim($_POST['unit_code']);
	}
	
	if(empty($_POST['lec'])) {
		$data_missing[] = 'Lecturer';
	} else {
		$lec = trim($_POST['lec']);
	}
	
	
	if(empty($_POST['lec_attend'])) {
		$data_missing[] = 'Lecturer attendance';
	} else {
		$lec_attend = trim($_POST['lec_attend']);
	}
	
	if(empty($_POST['covered'])) {
		$data_missing[] = 'Syllabus coverage ';
	} else {
		$covered = trim($_POST['covered']);
	}
	
	if(empty($_POST['resource'])) {
		$data_missing[] = 'Resource materials';
	} else {
		$res = trim($_POST['resource']);
	}
	
	//if(empty($_POST['lab'])) {
		//$data_missing[] = 'Lab attendance';
	//} else {
		$labs_attend = trim($_POST['lab']);
	//}
	
	
	
	
	if(empty($data_missing)){
		require_once('mysqli_connect.php');
		
		// choose course
		if($_POST['course'] == "cs"){ 
		// computer science units
			if($_POST['unit_code'] == "CCS2210"){
				$unit_name="Knowledge representation and reasoning";
				$query = "INSERT INTO computerscience (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
					
			} else if($_POST['unit_code'] == "CCS2211"){
				$unit_name="Object-oriented programming";
				$query = "INSERT INTO computerscience (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			} else if($_POST['unit_code'] == "CCS2208"){
				$unit_name="Computer graphics";
				$query = "INSERT INTO computerscience (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			} else if($_POST['unit_code'] == "CCS2209"){
				$unit_name="Computer networks";
				$query = "INSERT INTO computerscience (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			} else if($_POST['unit_code'] == "CCS2207"){
				$unit_name="Internet application programming";
				$query = "INSERT INTO computerscience (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			} else if($_POST['unit_code'] == "SMA2215"){
				$unit_name="Vector analysis";
				$query = "INSERT INTO computerscience (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			
			} else {
				die('Please choose the right unit code<br><a href="evaluationpage1.php">Go back to evaluate another unit</a>
					<b /><br><a href="page1.php">Go back to main page</a>
');
				
			}
			
			
			
			// it units
		} else if($_POST['course'] == "it"){
			if($_POST['unit_code'] == "CIT2202"){
				$unit_name="Operating systems";
				$query = "INSERT INTO it (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
				} else if($_POST['unit_code'] == "CIT2201"){
					$unit_name="Programming";
					$query = "INSERT INTO it (year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			
			} else {
				die('Please choose the right unit code<br><a href="evaluationpage1.php">Go back to evaluate another unit</a>
					<b /><br><a href="page1.php">Go back to main page</a>');
				
			}
		
		
		
				
				
				
				
				
				
				
				// bbit units		
		
		} else if($_POST['course'] == "bbit"){
					
					die('Only CS and IT are available for now');
					
				}
				
		// execute query		
		$stmt = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($stmt, "idisssiiii", $yos, $sem, $acad_year, $unit_code, $unit_name, $lec, $lec_attend, $covered, $res, $labs_attend);
		mysqli_stmt_execute($stmt);
		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affected_rows == 1){
			echo 'Evaluations received. Thank you.<br><a href="evaluationpage1.php">Go back to evaluate another unit</a>
					<b /><br>';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else {
			echo 'Error occurred<br />';
			echo mysqli_error($dbc);
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		}
	} else {
		echo 'You need to enter the following<br />';

		foreach($data_missing as $missing){
			echo $missing;
			echo '<br><a href="evaluationpage1.php">Go back</a><br>';
		}
	}
}

?>

<br />
<a href="evaluationpage1.php">Go back to evaluate another unit</a>
<b />
<a href="page1.php">Go back to main page</a>

	<footer id="main-footer">
	<hr>
	Teacher evaluation &copy; 2021
	</footer> 


</body>
</html>