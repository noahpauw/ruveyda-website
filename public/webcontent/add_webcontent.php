<?
include "../cors.php";

$servername = "rdbms.strato.de";
$username = "dbu1393290";
$password = "nTwmj5JYgReNe@e";
$dbname = "dbs12868937";

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (Exception $exception) {
    die($exception);
}

if ($conn->connect_error) {
    die("Connection failed!");
}

// Haal alleen de gevraagde webcontent op
$route = $_GET["route"];
$contentType = $_GET["contentType"];
$priority = $_GET["priority"];

// Get all web content
$sql = 'INSERT INTO `contentblocks` VALUES(NULL, "", "' . $contentType . '", "' . $route . '", ' . $priority . ')';

try {
    $result = mysqli_query($conn, $sql);
} catch(Exception $e) {
    echo $e;
}