<?
include "../cors.php";

$servername = "rdbms.strato.de";
$username = "dbu1393290";
$password = "nTwmj5JYgReNe@e";
$dbname = "dbs12868937";

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (Exception $exception) {
    echo "An error occured while connecting to the database!";
    die($exception);
}

if ($conn->connect_error) {
    echo "An error occured while connecting to the database!";
    die("Connection failed!");
}

$uuid = $_GET["user_id"];

// Get all web content
$sql = 'DELETE FROM `sessions` WHERE uuid="' . $uuid . '"';

try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e;
}

if (!$result) {
    echo "An error occured while connecting to the database!";
    die();
}

echo json_encode([
    "success" => true,
]);