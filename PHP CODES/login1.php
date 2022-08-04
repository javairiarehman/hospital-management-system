

   <html>
   <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body style= "background: LightGray">
   

		<style>
.button {
background-color: blue;
color: white;





}
</style>

	
<?php if (isset($_POST['cnic'])){
//this code is executed when the form is submitted
?>

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
 echo "Connection failed: " . $e->getMessage();
}
$roll = $_POST["cnic"];
	

    echo "PROFILE OF cnic="; 
	echo $roll;  
	   $query_1 = $conn->prepare("select * from patient where CNIC_no = ?");
    $query_1->execute([$roll]);
       $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
	
 ?>
    <table class="table">
        <thead>
        <tr>
   <th>p id</th>
            <th>d id</th>
            <th>patient name</th>
            <th>c number</th>
            <th>email</th>   
            <th>gender</th>     
<th>address</th>  
<th>age</th>  
<th>diagnose</th>  
<th>cn number</th>  
<th>pas</th>    			
        </thead>

        <tbody>
		
			

        <?php
        foreach ($result as $key=>$value){
            echo '<tr>
              <td>'.$value["P_ID"].'</td>
               <td>'.$value["D_id"].'</td>
               <td>'.$value["PatientName"].'</td>
               <td>'.$value["PatientContno"].'</td>
               <td>'.$value["PatientEmail"].'</td>
			   <td>'.$value["PatientGender"].'</td>
			   <td>'.$value["PatientAdd"].'</td>
			   <td>'.$value["PatientAge"].'</td>
			   <td>'.$value["Patientdiaganoses"].'</td>
			   <td>'.$value["CNIC_no"].'</td>
			     <td>'.$value["Password"].'</td>
            </tr>';
        
		}
		

        ?>

        </tbody>
    </table>
	<table width="100%" height="25%" style="background-color:Gray ;color:white" border="2px">
		 <tr>	
		 <br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		     <td width="30px"style="font-size40px;text-align:center"><a href="book_appointment.php" style="color:white ; text-decoration:none"><strong> Book Appointment</strong></a></td>
		     <td width="70px"style="font-size40px;text-align:center"><a href="update.php" style="color:white ; text-decoration:none"><strong> Disease Update</strong></a></td>
		     
			 
			 
          </tr>		
		</table>
<br>
<input type="hidden" name="log" value="1" /></center>
<center><td width= "80%"><label    for="log"><button class="button"><a href="login1.php" style="color:white ; text-decoration:none">BACK</a></button></label> </td></center> 


<?php
}
else{
	?>
 
<form action="login1.php" method="POST">







   


<h1><center>HOSPITAL LOG IN PATIENT </center></h1>
<center><br> <font size="+1">CNIC NUMBER:</font></center>

<center><input type="text" name="cnic"></center>



<br>
<input type="hidden" name="form_submitted" value="1" />
<center><td width= "80%"><label    for="login"><button class="button">LOGIN</button></label> </td></center>


<br>

<center><br> <font size="+1">TO CREATE NEW ACCOUNT:</font></center>
<input type="hidden" name="form_submitted1" value="1" /	>
<center><td width= "80%"><label    for="sigin">
<a href="patient_signin.php" style="color: ; text-decoration:none"><strong>SIGIN</strong></a>
</label> </td></center>

<br>
<br>
<input type="hidden" name="log" value="1" />
<center><td width= "80%"><label    for="log"><button class="button"><a href="connection.php" style="color:white ; text-decoration:none">BACK</a></button></label> </td></center>
<?php
}
?>


</body>
</html>