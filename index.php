<html>
<head>
<title></title>
</head>

<bod>
<?php
$servername = "localhost";
$username = "root";
$password = "sither04";
$dbname = "conti";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
} 
echo "Connected successfully";



// create a table in database "conti"
// table fields id=int(6), name = varchar(20), place = varchar(40), phone = varchar(15), zipcode = int
//$sql = "CREATE TABLE demo ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  name VARCHAR(30) NOT NULL, place VARCHAR(40) NOT NULL, phone VARCHAR(15) NOT NULL, zipcode int(7))";
//if ($conn->query($sql) === TRUE) {
//    echo "Table demo created successfully";
//} else {
//    echo "Error creating table: " . $conn->error;
//}


// insert data into table
for ($x = 1; $x <= 10; $x++) { // number of rows in excel sheet
	$name = 'skata';
	$place = 'bettiah';
	$phone = '+4917636090092';
	$zipcode = 100200;

    echo "The number is: $x <br>";
	$sql1 = sprintf("INSERT INTO demo (name, place, phone, zipcode) VALUES('%s', '%s', '%s', %d)", $name, $place, $phone, $zipcode);

	if ($conn->query($sql1) === TRUE) {
		echo "insert to demo successfully";
	} else {
		echo "Error inserting into table: " . $conn->error;
	}
} 



$conn->close();
?>
</body>

</html>