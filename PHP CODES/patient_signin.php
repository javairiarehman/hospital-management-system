<html>
<head>
<title>Sign in Form</title>
</head>

<Body background="images/formpic.jpg""> 

<style>
.button {
background-color: blue;
color: white;




}
</style>


<?php if (isset($_GET['one'])){
//this code is executed when the form is submitted
?>
<h2>Thank You </h2>  
<p>Your are registered successfully!</p>
<td width= "80%"><label    for="logout">
<a href="login1.php" style="color: ; text-decoration:none"><strong>logout</strong></a>
</label>
<?php ;

    //connections
	$username = "root";
    $password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=hms", $username, $password);
 // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "";
} catch(PDOException $e) {
 echo " " . $e->getMessage();
}
	  
	  $patient_id = $_GET["PID"];
	  $doctor_id = $_GET["DID"];
	  $patient_name = $_GET["name"];
	  $patient_phn = $_GET["number"];
	  $patient_email = $_GET["email"];
		$patient_gender = $_GET["gender"];
		  $patient_address= $_GET["add"];
		   $patient_age = $_GET["age"];
		    $patient_diagnosis = $_GET["diease"];
			 $patient_cnic= $_GET["cnic"];
			  $patient_password = $_GET["pas"];
			  $patient_Medicine = $_GET["Medicine"];

$conn->query("insert into patient values('$patient_id','$doctor_id','$patient_name','$patient_phn','$patient_email','$patient_gender','$patient_address','$patient_age','$patient_diagnosis','$patient_cnic','$patient_password','$patient_Medicine')");
 




 ?> 
</p>
<p>Go <a href="patient_signin.php">back</a> to the form</p>
<?php }
else { ?>

<form action="patient_signin.php" method="GET">
















<br>
<br>
<br><br>

<fieldset background="images/formpic.jpg">
			<center><h2><legend class="redfont">Form </legend></h2>
			 ID(select id from counter) :<input type="text" name="PID"><br><br>
			  DOCTOR ID(select dr id from hospital counter) :<input type="text" name="DID"><br><br>
			 NAME:<input type="text" name="name"><br><br>
			CONTACT NUMBER: <input type="text" name="number"><br>
		
			EMAIL  : <input type="text" name="email"><br><br>
		GNEDER: <input type="text" name="gender"><br>
		ADDRESS: <input type="text" name="add"><br>
		AGE: <input type="number" name="age"><br>
			<input type="radio" name ="age" checked>Under 18<input type="radio" name ="age">above 18<br><br>
		DIEASE: <input type="text" name="diease"><br>
		CNIC(5 DIGIT): <input type="text" name="cnic"><br>
		PASSWORD: <input type="text" name="pas"><br>
		Medicine(if you have used any before otherwise leave empty): <input type="text" name="Medicine"><br>
			</center>
			
			
			
			
			
		
			
			
			<input type="hidden" name="one" value="1" />
<br> <center><label    for="submit"><button class="button">Submit</button></label></center>
			
			</fieldset>
			
			</form>








<?php } ?>
</body>

</html>