<html> 
    <head> 
         <title> Physics Club Registration </title>
    <head>

    <body>
         <h1> Welcome to the Physics Club Table! </h1>
         <br>
         <br>
         <p> Please enter your first name, last name and email to register for the club. </p>

         <br>
       <form action = "index.php" method = POST>
           First Name: 
           <input type = "text" name = "fname" placeholder = "first name">
           Last Name:
           <input type = "text" name = "lname" placeholder  = "last name">
           Email:
           <input type = "text" name = "email" placeholder = "student@messiah.edu">
           <input type = "submit" value = "Submit">
       </form>

    </body>
</html>

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
