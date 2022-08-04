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
<td width= "80%"><label    for="Back">
<a href="login2.php" style="color: ; text-decoration:none"><strong>Back</strong></a>
</label>
<?php ;

    //connections
	$username = "root";
    $password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=hms", $username, $password);
 // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "Connected successfully";
} catch(PDOException $e) {
 echo "Connection failed: " . $e->getMessage();
}
	  
	  
	  $doctor_id = $_GET["DID"];
	  $patient_name = $_GET["specialization"];
	  $patient_phn = $_GET["name"];
	  $patient_email = $_GET["address"];
		$patient_gender = $_GET["age"];
		  $patient_address= $_GET["gender"];
		   
			 $patient_cnic= $_GET["cnic"];
			  $patient_password = $_GET["pas"];

$conn->query("insert into doctors values('$doctor_id','$patient_name','$patient_phn','$patient_email','$patient_gender','$patient_address','$patient_cnic','$patient_password')");
 




 ?> 
</p>
<p>Go <a href="doctor_signin.php">back</a> to the form</p>
<?php }
else { ?>

<form action="doctor_signin.php" method="GET">
















<br>
<br>
<br><br>

<fieldset background="images/formpic.jpg">
			<center><h2><legend class="redfont">Form </legend></h2>
			 
			  DOCTOR ID(select dr id from hospital counter) :<input type="text" name="DID"><br><br>
			 specialization:<input type="text" name="specialization"><br><br>
			dr.name: <input type="text" name="name"><br>
		
			address  : <input type="text" name="address"><br><br>
		
		AGE: <input type="number" name="age"><br>
			<input type="radio" name ="age" checked>Under 18<input type="radio" name ="age">above 18<br><br>
		gender: <input type="text" name="gender"><br>
		CNIC(5 DIGIT): <input type="text" name="cnic"><br>
		PASSWORD: <input type="text" name="pas"><br>
			</center>
			
			
			
			
			
		
			
			
			<input type="hidden" name="one" value="1" />
<br> <center><label    for="submit"><button class="button">Submit</button></label></center>
			
			</fieldset>
			
			</form>








<?php } ?>
</body>

</html>