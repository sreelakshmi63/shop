 <?php
$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "shoppingcart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uname = $_POST['Username'];
$pword = $_POST['Password'];
$email = $_POST['Email'];
$mobile = $_POST['Mob'];


//inserting into table

$sql="INSERT INTO users (Username,Password,Email,Mob)VALUES ('$uname','$pword','$email','$mobile')";

if (mysqli_query($conn, $sql))
{ echo "Registered Successfully";
}
else
{echo "Not connected";}
mysqli_close($conn);
?>

