<html>
<head>

<title>Book Appointment</title>
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
<p>Course has been added
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
	  
	  $patient_id = $_GET["PID"];
	  $Appointment_Date = $_GET["date"];
	  $Appointment_time = $_GET["time"];
	  $doctor_id = $_GET["DID"];

$conn->query("insert into appointment values('$patient_id','$Appointment_Date','$Appointment_time','$doctor_id')");
 




 ?> 
</p>
<p>Go <a href="login1.php">logout</a> to the form</p>
<?php }
else { ?>

<form action="book_appointment.php" method="GET">














<br>


<center><h2>Book Appointment</h2></center>
<br>
<br>
<br><br>

<fieldset background="images/formpic.jpg">
			<center><h2><legend class="redfont">Form </legend></h2>
			 Patient ID:<input type="number" name="PID"><br><br>
			 Date:<input type="text" name="date"><br><br>
			 Time:<input type="text" name="time"><br><br>
			 Doctor ID:<input type="number" name="DID"><br><br>
			
			</center>
			
			
			
			
			
		
			
			
			<input type="hidden" name="one" value="1" />
<br> <center><label    for="submit"><button class="button">Submit</button></label></center>
			
			</fieldset>
			
			</form>








<?php } ?>
</body>

</html>