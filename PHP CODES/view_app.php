

   <html>
   <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body style= "background: pink">
   

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
	

    echo "ENTRY AGAINST cnic="; 
	echo $roll;  
	   $query_1 = $conn->prepare("select * from doctors where CNIC_no = ?");
    $query_1->execute([$roll]);
       $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
	
 ?>
    <table class="table">
        <thead>
        <tr>
   
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
}
else{
	?>
 
<form action="login2.php" method="POST">







   


<h1><center>HOSPITAL LOG IN  DOCTOR</center></h1>
<center><br> <font size="+1">CNIC NUMBER:</font></center>

<center><input type="text" name="cnic"></center>



<br>
<input type="hidden" name="form_submitted" value="1" />
<center><td width= "80%"><label    for="login"><button class="button">LOGIN</button></label> </td></center>
<?php
}
?>
</body>
</html>