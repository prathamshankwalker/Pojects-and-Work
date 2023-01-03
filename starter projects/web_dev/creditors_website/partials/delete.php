<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "credit";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);



$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from tblemp where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:all_records.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>