<?php

if ((isset($_POST['fname'])) && isset($_POST['lname']) && isset($_POST['email'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	addtodb($fname, $lname, $email);
}
else {
	echo "Not all fields have been filled out";
}


function addtodb($fname, $lname, $email) {
	$database = new SQLite3('/var/physicsclubinfo.db');
	$sql = "INSERT INTO members (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";
	$database->query($sql);
	echo "Welcome to the Physics Club $fname $lname!";

}
?>
