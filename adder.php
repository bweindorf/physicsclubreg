<?php

if ($_POST['fname'] && $_POST['lname'] && $_POST['email']) {
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
	$database->enableExceptions(true);
	try {
	    $sql = "INSERT INTO members (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";
	    $database->query($sql);
	    echo "Welcome to the Physics Club $fname $lname!";
	}
	catch (Exception $e) {
		if($e->getMessage() == "UNIQUE constraint failed: members.email") {
			echo "It appears that you have already registered.";
		} else {
			echo "An error has occurred, please try again.";
		}
	}

}
?>
