<?php
// Getting the value of post parametres

$room = $_POST['room'];

//checking for string size

if (strlen($room)>20 or strlen($room)<2 ){
	# code..
	$message = "Please choose a name between 2 t 20 charecter";
	echo '<script language = "javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/MyChat";';
	echo '</script>';
}

//checking the wheather the room name is alphanumeric
 else if (!ctype_alnum($room)) {
    $message = "Please choose an alphanumeric room name";
	echo '<script language = "javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/MyChat";';
	echo '</script>';
 	
 }
 else{
 	//connect to database
 	include 'db_connect.php';
 }

 //Check if room already exists
 $sql = "SELECT * FROM rooms WHERE roomname = '$room'";
 $result = mysqli_query($conn, $sql);
 if ($result) {
 	# code...
 	if (mysqli_num_rows($result) > 0) {
 		$message = "Please choose an diffrent room name. This room is alredy claimed";
		echo '<script language = "javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/MyChat";';
		echo '</script>';
	 	}
	 	else{
	 		$sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ( '$room', current_timestamp());";
	 		if (mysqli_query($conn, $sql)) {
	 			$message = "Your room is ready lets chat now";
				echo '<script language = "javascript">';
				echo 'alert("'.$message.'");';
				echo 'window.location="http://localhost/MyChat/rooms.php?roomname='.$room.'";';
				echo '</script>';
	 		}
	 	}
 }
 else{
 	echo "Error:".mysqli_error($conn);
 }
?>