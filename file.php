<?php
$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "shoppingcart";

// Connection to database & selecting database to workwith
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "connection successful<br>";
//execute spl query and return records
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Useranme: " . $row["Username"];
	echo "Password: " . $row["Password"];
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

