<?php
	include 'header.inc.php';
?>
<html>
	<head>
		<title>Evaluation Questionnaire</title>
	</head>
<body>
<div class="container" id="frr">
<form class="form1" action="confirmevaluations.php" method="post">
	<b>Give evaluations below</b>
	<br /> <br />
	

	<fieldset>
		<legend>Select appropriately</legend>
		
		<p>
		<label>Select course:</label>
		<select class="sel" name="course" required>
			<option value="" selected>Select...</option>
			<option value="cs">Computer Science</option>
			<option value="it">IT</option>
			<option value="bbit">BBIT</option>
		</select>
		<br />
		</p>
		
		<p>
		<label>Year of study</label>
		<select class="sel" name="yos" required>
			<option value="" >Select...</option>
			<option value=1>First Year</option>
			<option value=2>Second Year</option>
			<option value=3>Third Year</option>
			<option value=4>Fourth Year</option>
		</select>
		<br />
		</p>
		
		<p>Semester(e.g. 2.1 etc):
		<input class="sel" type="text" name="sem" size="5" value="" required />
		</p>
		
		<p>
		<label>Academic year</label>
		<select  class="sel" name="acad_year" required>
			<option value=""> Select...</option>
			<option value=2019>2019</option>
			<option value=2020>2020</option>
			<option value=2021>2021</option>
		</select>
		<br />
		</p>
		
		
		<p>
		<label>Unit code:</label>
		<select class="sel" name="unit_code" required>
			<option value="" >Select...</option>
			<option value="CCS2210">CCS2210</option>
			<option value="CCS2211">CCS2211</option>
			<option value="CCS2208">CCS2208</option>
			<option value="CCS2209">CCS2209</option>
			<option value="CCS2207">CCS2207</option>
			<option value="SMA2215">SMA2215</option>
			<option value="CIT2202">CIT2202</option>
			<option value="CIT2201">CIT2201</option>
		</select>
		<br />
		</p>
		
		<p>Lecturer(e.g. Kamundi, Naivasha etc):
		<input class="sel" type="text" name="lec" value="" required />
		</p>
		
	</fieldset>
	
	<fieldset>
		<legend>Class work evaluation</legend>
		
		<p>1. Did the lecturer attend all the classes?:
		<input type="radio" name="lec_attend" required value=1> 
		<input type="radio" name="lec_attend" required value=2> 
		<input type="radio" name="lec_attend" required value=3> 
		<input type="radio" name="lec_attend" required value=4> 
		<input type="radio" name="lec_attend" required value=5>
		</p>
		
		<p>
		<label>2. Did the lecturer cover the course outline?</label>
		<input type="radio" name="covered" required value=1> 
		<input type="radio" name="covered" required value=2> 
		<input type="radio" name="covered"  required value=3> 
		<input type="radio" name="covered" required value=4> 
		<input type="radio" name="covered" required value=5>
		</p>
		
		<p>
		<label>3. Did the lecturer give adequate resource materials?</label>
		<input type="radio" name="resource" required value=1> 
		<input type="radio" name="resource" required value=2> 
		<input type="radio" name="resource"  required value=3> 
		<input type="radio" name="resource" required value=4> 
		<input type="radio" name="resource" required value=5>
		<br /> <br />
		</p>
	</fieldset>
	
	<fieldset>
		<legend>Laboratory sessions evaluation</legend>
		
		<p>
		<label>4. Were all the lab sessions carried out?</label>
		<input type="radio" name="lab" value=1> 
		<input type="radio" name="lab" value=2> 
		<input type="radio" name="lab" value=3> 
		<input type="radio" name="lab" value=4> 
		<input type="radio" name="lab" value=5>
		<label>&nbsp;&nbsp;N/A:</label>
		<input type="radio" name="lab" value=0>
		</p>
		<br />
	</fieldset>
	
	<p>
		<input class="button" type="submit" name="submit" value="Submit evaluation" />
	</p>
</form>
</div>
	
	<footer id="main-footer">
	<hr>
	Teacher evaluation &copy; 2021
	</footer> 
	
</body>
</html>