<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
?>
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
//$sql = "CREATE TABLE example ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  firstname VARCHAR(30) NOT NULL, place VARCHAR(40) NOT NULL, date VARCHAR(40) NOT NULL, phone VARCHAR(15) NOT NULL, zipcode int(7))";
//if ($conn->query($sql) === TRUE) {
//    echo "Table demo created successfully";
//} else {
//    echo "Error creating table: " . $conn->error;
//}


// load xls file
$data = new Spreadsheet_Excel_Reader("file_example.xls");
$sheet=0;


for($row=1;$row<=$data->rowcount($sheet);$row++) {

	$firstname = $data->val($row,1);
	$place = $data->val($row,2);
	$date = $data->val($row,3);
	$phone = $data->val($row,4);
	$zipcode = $data->val($row,5);
	
	$sql1 = sprintf("INSERT INTO example (firstname, place, date, phone, zipcode) VALUES('%s', '%s', '%s','%s', %d)", $firstname, $place, $date, $phone, $zipcode);

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