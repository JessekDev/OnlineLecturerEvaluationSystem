<?php
	include 'header.inc.php';
?>

<form action="showevaluations.php" method="post">
<p>Select course to review:<br />
<select class="sel" name="selection">
	<option value="" selected>Select...</option>
	<option value="cs">Computer Science</option>
	<option value="it">IT</option>
	<option value="bbit">BBIT</option>
</select>

<input class="button" type="submit" name="submit" value="Show evaluations" />



<a class="button" id="lgout" href="page1.php">Go back to main page/log out</a>
<div style="clear:both;"> </div>

<p>
<a href="#summ">Jump to summaries</a>
</p>
</form>

<?php
require_once('mysqli_connect.php');

DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_NAME', 'evaluationdatabase');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' . mysqli_connect_error());

if(isset($_POST['submit']) && !empty($_POST['submit'])){


	if($_POST['selection'] == "cs"){
		$query = "SELECT year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered FROM computerscience";
			} else if($_POST['selection'] == "it"){
						$query = "SELECT year_of_study, semester, academic_year, unit_code, unit_name, lecturer, lecturer_attendance, syllabus_covered, resource_material, lab_attend, date_entered FROM it";
			} else if($_POST['selection'] == "bbit"){
						die('Only CS and IT are available for now');
	} else {
		echo 'Not selected';
	}

	$response = @mysqli_query($dbc, $query);

	if($response) {
		echo '<div id="table1"><table align="left" cellspacing="5" cellpadding="8">
		<tr>
		<td align="right"><b>Year of study</b></td>
		<td align="right"><b>Semester</b></td>
		<td align="right"><b>Academic year</b></td>
		<td align="right"><b>Unit code</b></td>
		<td align="left"><b>Unit name</b></td>
		<td align="right"><b>Lecturer</b></td>
		<td align="right"><b>Lecturer attendance</b></td>
		<td align="right"><b>Syllabus coverage</b></td>
		<td align="right"><b>Resource materials</b></td>
		<td align="right"><b>Lab attendance</b></td>
		<td align="right"><b>Date entered</b></td>
		</tr>';
		
		while($row = mysqli_fetch_array($response)) {
			echo '<tr><td align="right">' .
			$row['year_of_study'] . '</td><td align="right">' .
			$row['semester'] . '</td><td align="right">' .
			$row['academic_year'] . '</td><td align="right">' .
			$row['unit_code'] . '</td><td align="left">' .
			$row['unit_name'] . '</td><td align="left">' .
			$row['lecturer'] . '</td><td align="right">' .
			$row['lecturer_attendance'] . '</td><td align="right">' .
			$row['syllabus_covered'] . '</td><td align="right">' .
			$row['resource_material'] . '</td><td align="right">' .
			$row['lab_attend'] . '</td><td align="right">' .
			$row['date_entered'] . '</td><td align="right">' ;
			
			echo '</tr>';
		
		}
		echo '</table></div>';
		
		
		echo '<div style="clear:both;"> </div>';
	
	
	echo '<div id="summ"><h2>Summaries</h2></div>';
	if($_POST['selection'] == "cs"){
		$query2 = "SELECT lecturer, avg(lecturer_attendance), avg(syllabus_covered), avg(resource_material), avg(lab_attend) FROM computerscience GROUP BY lecturer ORDER BY avg(lecturer_attendance) desc ";
		} else if($_POST['selection'] == "it"){
			$query2 = "SELECT lecturer, avg(lecturer_attendance), avg(syllabus_covered), avg(resource_material), avg(lab_attend) FROM it GROUP BY lecturer ORDER BY avg(lecturer_attendance) desc ";

			}
		else{ echo 'Only CS and IT are available for now';}
	
	$response2 = @mysqli_query($dbc, $query2);
	
	if($response2){
		echo '<table align="left" cellspacing="5" cellpadding="8">
				<tr>
				<td align="right"><b>Lecturer</b></td>
				<td align="right"><b>Average attendance</b></td>
				<td align="right"><b>Average syllabus coverage</b></td>
				<td align="right"><b>Average resource material</b></td>
				<td align="right"><b>Average lab attendance</b></td>
				</tr>';
		while($row2 = mysqli_fetch_array($response2)) {
		echo '<tr><td align="right">' .
		$row2['lecturer'] . '</td>
		<td align="right">' .
		$row2['avg(lecturer_attendance)'] . '</td>
		<td align="right">' . 
		$row2['avg(syllabus_covered)'] . '</td>
		<td align="right">' .
		$row2['avg(resource_material)'] . '</td>
		<td align="right">' .
		$row2['avg(resource_material)'] . '</td>
		<td align="right">' ;
		echo '</tr>';
	
	} echo '</table>';
	}
	

	
} else {
	echo '<br />Could not issue database query';
	echo mysqli_error($dbc);
}
}
mysqli_close($dbc);
?>

<div style="clear:both;"> </div>
<br />
<a class="button" id="lgout" href="page1.php">Go back to main page/log out</a>