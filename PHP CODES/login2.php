

   <html>
   <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body >
   

		<style>
.button {
background-color: blue;
color: white;






}
body {
  background-image: url('images/login1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
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
	

     
	   $query_1 = $conn->prepare("select * from doctors where  D_id= ?");
    $query_1->execute([$roll]);
       $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
	   
	   ?>
			    <table class="table">
        <thead>
        <tr>
  <center> <h2> DOCTOR DETAILS</h2></center>
            <th>doctor id</th>
            <th>spcialization</th>
            <th>doctor name</th>
            <th>address</th>   
            <th>doctor age</th> 
<th>gender</th>
<th>cnic</th>
<th>password</th>
     			

        </thead>

        <tbody>
		
        <?php
        foreach ($result as $key=>$value){
            echo '<tr>
              <td>'.$value["D_id"].'</td>
               <td>'.$value["specilization"].'</td>
               <td>'.$value["D_name"].'</td>
               <td>'.$value["address"].'</td>
               <td>'.$value["D_age"].'</td>
			   <td>'.$value["D_gender"].'</td>
			   
			   <td>'.$value["CNIC_no"].'</td>
			     <td>'.$value["Password"].'</td>
            </tr>';
        
		}
		

        ?>

        </tbody>
    </table>
 
<?php
	   
	      $query_1 = $conn->prepare("select P_ID,D_id,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,Patientdiaganoses,Medicine from patient where D_id = ?");
    $query_1->execute([$roll]);
       $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
	
 ?>



<br>
<br>
<br>

  <center> <h2> YOUR PATIENTS DETAIL</h2></center>

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
 			
<th>medicine</th>    			
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
			   
			     <td>'.$value["Medicine"].'</td>
            </tr>';
        
		}
		

        ?>

        </tbody>
    </table>









<br>
<input type="hidden" name="updated" value="1" />
<center><td width= "80%"><label    for="login"><button class="button"><a href="update_med.php" style="color:white ; text-decoration:none">update</a></button></label> </td></center>



<br>
<input type="hidden" name="log" value="1" /></center>
<center><td width= "80%"><label    for="log"><button class="button"><a href="login2.php" style="color:white ; text-decoration:none">BACK</a></button></label> </td></center>



<?php
}
else{
	?>
 
<form action="login2.php" method="POST">







   


<h1><center>HOSPITAL LOG IN  DOCTOR</center></h1>
<center><br> <font size="+1">DOCTOR ID:</font></center>

<center><input type="text" name="cnic"></center>



<br>
<input type="hidden" name="form_submitted" value="1" />
<center><td width= "80%"><label    for="login"><button class="button">LOGIN</button></label> </td></center>
<center><td width= "80%"><label    for="sigin">
<br>
<br>
<h6>TO CREATE NEW ACCOUNT:</h6>

<a href="doctor_signin.php" style="color: ; text-decoration:none"><strong>SIGIN</strong></a>
</label> </td></center>






<br>
<input type="hidden" name="log" value="1" /></center>
<center><td width= "80%"><label    for="log"><button class="button"><a href="connection.php" style="color:white ; text-decoration:none">BACK</a></button></label> </td></center>





<?php
}
?>
</body>
</html>