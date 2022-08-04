

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

	
<?php 
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


     
	  
	   
	   ?>
			 
 
<?php
	   
	      $query_1 = "select P_ID,D_id,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,Patientdiaganoses,Medicine from patient ";

$result = $conn->query($query_1);
    //   $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
	
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
<input type="hidden" name="log" value="1" />
<center><td width= "80%"><label    for="log"><button class="button"><a href="login3.php" style="color:white ; text-decoration:none">Back</a></button></label> </td></center>


 



</body>
</html>