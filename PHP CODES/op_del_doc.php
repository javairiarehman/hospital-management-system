

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
  background-image: url('images/login4.jpg');
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
	
	
	
?>
<center><h2>THANK YOU</h2>
<h3>YOUR ENTRY HAS BEEN DELETED</h3>
<br>
<input type="hidden" name="log" value="1" /></center>
<center><td width= "80%"><label    for="log"><button class="button"><a href="edit_doc.php" style="color:white ; text-decoration:none">BACK</a></button></label> </td></center>

	<?php  
	   $query_1 = $conn->prepare("delete  from doctors where D_id = ?");
    $query_1->execute([$roll]);
       $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
	
 ?>
 
		
			

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


 


<?php
}
else{
	?>
 
<form action="op_del_doc.php" method="POST">







   


<h1><center>ENTER DR ID WHICH U WANT TO DELETE </center></h1>
<center><br> <font size="+1">DOCTOR ID:</font></center>

<center><input type="text" name="cnic"></center>



<br>
<input type="hidden" name="form_submitted" value="1" />
<center><td width= "80%"><label    for="login"><button class="button">LOGIN</button></label> </td></center>



<br>
<input type="hidden" name="log" value="1" />
<center><td width= "80%"><label    for="log"><button class="button"><a href="connection.php" style="color:white ; text-decoration:none">BACK</a></button></label> </td></center>
<?php
}
?>
</body>
</html>