<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'PHPexcel_reader.php';
?>
<html>
<head>
<title></title>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "sither04";
$dbname = "gdidb";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
} 
echo "Connected successfully <br><br>";


// create a table in database "gdidb"
// table fields id=int(6), series_number = varchar(20), injector_number = varchar(40), group_name = varchar(15), nr_holes = int(3)
/* 
$sql = "CREATE TABLE seat_data ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  series_number VARCHAR(30) NOT NULL, injector_number VARCHAR(40) NOT NULL, date VARCHAR(40) NOT NULL, group_name VARCHAR(15) NOT NULL, nr_holes int(3))";
if ($conn->query($sql) === TRUE) {
   echo "Table seat_data created successfully";
} else {
   echo "Error creating table: " . $conn->error;
} */


// load xls file
$data = new Spreadsheet_Excel_Reader("file_exArray.xls");
$sheet=0;


for($row=1;$row<=$data->rowcount($sheet);$row++) {

	$series_number = $data->val($row,1);
	$injector_number = $data->val($row,2);
	$date = $data->val($row,3);
	$group_name = $data->val($row,4);
	$nr_holes = $data->val($row,5);
	
	$sql1 = sprintf("INSERT INTO seat_data (series_number, injector_number, date, group_name, nr_holes) VALUES('%s', '%s', '%s','%s', %d)", $series_number, $injector_number, $date, $group_name, $nr_holes);

	if ($conn->query($sql1) === TRUE) {
		echo "Inserted to seat_data successful <br>";
	} else {
		echo "Error inserting into table: " . $conn->error;
	}
	
}


$conn->close();
?>
</body>

</html>