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

// Pretty much kicks out a user once they revisit this page and is logged in
if( $_SESSION["pro.html"] )
    {
        echo "You are already logged in, ".$_SESSION['name']."! <br> I'm Loggin you out M.R ..";
        unset( $_SESSION );
        session_destroy();
        exit("");
    }

    $loggedIn = false;
    $userName = $_POST["Username"] or "";
    $userPass = $_POST["Password"] or "";

    if ($userName && $userPass )
    {
    
   // User Entered fields
        $query = "SELECT Username , Password FROM users WHERE Username = '$userName' AND Password = '$userPass'";// AND password = $userPass";

        $result = mysqli_query( $conn, $query);
        $row = mysqli_fetch_array($result);

        if(!$row){
            echo "<div>";
            echo "No existing user or wrong password.";
            echo "</div>";
        }
        else
            $loggedIn = true;
    }

    if ( !$loggedIn )
    {
        echo "
            <form action='pro.html' method='post'>
                Name: <input type='text' name='Username' value='$userName'><br>
                Password: <input type='password' name=Password' value='$userPass'><br>
                <input type='submit' value='log in'>
            </form>
        ";
    }
    else{
        echo "<div>";
        echo "You have been logged in as $userName!";
        echo "</div>";
        $_SESSION["name"] = $userName;
    }


mysqli_close($conn);
?>

