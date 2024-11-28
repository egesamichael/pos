<?php 
	include('server/connection.php');
	if(isset($_POST['submit'])){
		$user 		= mysqli_real_escape_string($db, $_POST['user']);
		$fname 		= mysqli_real_escape_string($db, $_POST['fname']);
		$lname 		= mysqli_real_escape_string($db, $_POST['lname']);
		$address	= mysqli_real_escape_string($db, $_POST['address']);
		$number		= mysqli_real_escape_string($db, $_POST['number']);
	  
		
		$sql  = "INSERT INTO customer (firstname,lastname,address,contact_number) VALUES ('$fname','$lname','$address','$number')";
	  	$result = mysqli_query($db, $sql);
 		if($result == true){
 			$query 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','Customer $fname Added',CURRENT_TIMESTAMP)";
 			$insert 	= mysqli_query($db,$query);
			header('location: main.php?username='.$user.'&added');
	  	}else{
			$msg = "Something went wrong!";
	  	}
	}
