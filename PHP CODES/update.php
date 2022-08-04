

   <html>
   <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body>
   

		<style>
.button {
background-color: blue;
color: white;

}
body {
  background-image: url('images/update.jpg');
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
$roll1=$_POST["dis"];	

    echo "PROFILE OF cnic="; 
	echo $roll;  
	
	
	
	
	
	
	   $query_2 = $conn->prepare("update patient set Patientdiaganoses=? where CNIC_no= ?");
    $query_2->execute([$roll1,$roll]);
	
       $result2 = $query_2->fetchAll(PDO::FETCH_ASSOC);
	
	
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
	
 <p>Go <a href="login1.php">logout</a> 


<?php
}
else{
	?>
 
<form action="update.php" method="POST">







   


<h1><center>TO ENER NEW DISEASE </center></h1>
<center><br> <font size="+1">ENTER CNIC NUMBER:</font></center>

<center><input type="text" name="cnic"></center>

<center><br> <font size="+1">NEW DISEASE:</font></center>

<center><input type="text" name="dis"></center>


<br>
<input type="hidden" name="form_submitted" value="1" />
<center><td width= "80%"><label    for="ok"><button class="button">OK</button></label> </td></center>


<br>



<?php
}
?>
</body>
</html>