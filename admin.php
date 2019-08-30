<html> 
<head> <title> Physics Club Sign-Up Sheet </title> </head>


<?php
    
if (isset($_POST['email'])) {
	$email = $_POST['email'];
	del($email);
    }
    else {
	    build();
    }

function build() {
    
    echo "<div><table><tr><td>First Name </td><td> Last Name </td><td> Email </td></tr>";
    $database = new SQLite3('/var/physicsclubinfo.db');
    $sql = "SELECT * FROM members";
    $res = $database->query($sql);

    while ($row = $res->fetchArray()) {
	$fname = $row["firstname"];
	$lname = $row["lastname"];
	$email = $row["email"];
	echo "<tr><td>$fname</td><td>$lname</td><td>$email</td><td><button onclick = 'del(this)'>Delete</button></td></tr>";
    } 

    echo "</table></div>";
    echo "<button onclick = document.location.reload(true)>Show Changes</button>";
    $database->close();
    }

    function del($email) {
	$database = new SQLite3('/var/physicsclubinfo.db');
	$sql = "DELETE FROM members WHERE email = '$email'";
	$res = $database->query($sql);
	$database->close();
    }



?>
	   
 <script>
     function del(obj) {
	  var email = obj.parentElement.previousSibling.innerText;
	  var hr = new XMLHttpRequest();
	  var link = 'admin.php';
	  var params = "email=" + email;
          hr.open("POST", link, true);
	  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  hr.send(params);
	  
     }
    </script>


</html>
